<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlans;
use Stripe\Exception\CardException;
use Illuminate\Support\Facades\Validator;

class StripeController extends Controller
{
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(config('stripe.api_keys.secret_key'));
    }

    public function index()
    {
        return view('layouts.payment');
    }

    public function createSession($cart)
    {
        $user = auth()->user();

        if ($user->stripe_id == null) {
            $this->createCustomer($user);
        } else {
            $this->updateCustomer($user);
        }

        $session = $this->stripe->checkout->sessions->create([
            'success_url' => route('cart.check') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cart.index'),
            'customer' => $user->stripe_id,
            'client_reference_id' => $user->firstname . ' ' . $user->lastname,
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => $cart,
            'shipping_address_collection' => [
                'allowed_countries' => ['FR'],
            ],
            'phone_number_collection' => [
                'enabled' => true,
            ],
        ]);
        return $session;
    }

    public function createPlan(SubscriptionPlans $subscriptionPlans)
    {
        $plan = $this->stripe->plans->create([
            'id' => $subscriptionPlans->id,
            'amount' => $subscriptionPlans->price * 100,
            'currency' => 'eur',
            'interval' => 'month',
            'product' => [
                'name' => $subscriptionPlans->name,
                'type' => 'service',
            ],
        ]);
        if ($subscriptionPlans->description != null) {
            $this->stripe->products->update(
                $plan->product,
                [
                    'description' => $subscriptionPlans->description
                ]
            );
        }
        $subscriptionPlans->stripe_id = $plan->id;
        $subscriptionPlans->stripe_plan = $plan->product;
        $subscriptionPlans->save();
    }

    public function updatePlan(SubscriptionPlans $subscriptionPlans)
    {
        // can't update plan price with stripe api
        // $this->stripe->plans->update(
            // $subscriptionPlans->stripe_plan,
            // [
                // 'amount' => $subscriptionPlans->price * 100,
                // 'currency' => 'eur',
                // 'interval' => 'month',
            // ]
        // );

        $this->stripe->products->update(
            $subscriptionPlans->stripe_plan,
            [
                'name' => $subscriptionPlans->name,
                'description' => $subscriptionPlans->description
            ]
        );
    }

    public function deletePlan($stripe_id, $stripe_plan)
    {
        $plan = $this->stripe->plans->retrieve($stripe_id);
        $plan->delete();

        $product = $this->stripe->products->retrieve($stripe_plan);
        $product->delete();
    }

    public function retrivePlanId(SubscriptionPlans $subscriptionPlans)
    {
        $plans = $this->stripe->plans->all();
        foreach ($plans as $plan) {
            $product = $this->stripe->products->retrieve($plan->product);
            if ($plan->amount == $subscriptionPlans->price * 100 && $product->name == $subscriptionPlans->name) {
                return [
                    "stripe_id" => $plan->id,
                    "stripe_plan" => $product->id
                ];
            }
        }
        return null;
    }

    public function createCustomer(User $user)
    {
        $customer = $this->stripe->customers->create([
            'name' => $user->firstname . ' ' . $user->lastname,
            'email' => $user->email,
            'phone' => 'France' ? substr($user->phone, 1) : $user->phone,
            'address' => [
                'line1' => $user->address,
                'city' => $user->city,
                'postal_code' => $user->zip_code,
                'country' => $user->country == 'France' ? 'FR' : $user->country,
            ],
        ]);
        $user->stripe_id = $customer->id;
        $user->save();
    }

    public function updateCustomer(User $user)
    {
        $customer = $this->stripe->customers->update(
            $user->stripe_id,
            [
                'name' => $user->firstname . ' ' . $user->lastname,
                'email' => $user->email,
                'phone' => $user->country == 'France' ? substr($user->phone, 1) : $user->phone,
                'address' => [
                    'line1' => $user->address,
                    'city' => $user->city,
                    'postal_code' => $user->zip_code,
                    'country' => $user->country == 'France' ? 'FR' : $user->country,
                ],
            ]
        );
    }
    
    public function subscribeToPlan(SubscriptionPlans $subscriptionPlan, User $user)
    {
        // check if user already subscribed to plan
        if ($user->subscriptionPlan()->first() != null) {
            if ($user->subscriptionPlan()->first()->id == $subscriptionPlan->id) {
                return redirect()->back()->withErrors(['error' => 'You are already subscribed to this plan.']);
            }

            if ($user->stripe_id != null) {
                $this->unsubscribeToPlan($user);
            }

            if ($user->stripe_id == null && $user->subscriptionPlan()->first()->price > 0) {
                return redirect()->back()->withErrors(['error' => 'You are already subscribed to a plan but the plan is not linked to a stripe plan.']);
            }
        }

        if ($user->stripe_id == null) {
            $this->createCustomer($user);
        }

        // display payment page
        try {
            $session = $this->stripe->checkout->sessions->create([
                'success_url' => route('subscription-plans.check') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('subscription-plans.index'),
                'payment_method_types' => ['card'],
                'mode' => 'subscription',
                'customer' => $user->stripe_id,
                'line_items' => [[
                    'price' => $subscriptionPlan->stripe_id,
                    'quantity' => 1,
                ]],
            ]);
            return redirect()->away($session->url);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        // subscribe to plan
        // $subscription = $this->stripe->subscriptions->create([
            // 'customer' => $user->stripe_id,
            
            // 'items' => [
                // [
                    // 'plan' => $subscriptionPlan->stripe_id,
                // ],
            // ],
        // ]);
        // return $subscription;
    }

    public function unsubscribeToPlan(User $user)
    {
        $subscription = $this->retriveSubscription($user->stripe_id);
        
        foreach ($subscription as $sub) {
            $sub->cancel();
        }
    }

    public function retriveSession($session_id)
    {
        $session = $this->stripe->checkout->sessions->retrieve($session_id);
        return $session;
    }

    public function retriveCustomer($customer_id)
    {
        $customer = $this->stripe->customers->retrieve($customer_id);
        return $customer;
    }

    public function retriveSubscription($customer_id)
    {
        $subscription = $this->stripe->subscriptions->all([
            'customer' => $customer_id,
        ])->data;
        
        $subList = [];
        foreach ($subscription as $sub) {
            $subList[] = $this->stripe->subscriptions->retrieve($sub->id);
        }

        return $subList;
    }

    public function retriveInvoice($invoice_id)
    {
        $invoice = $this->stripe->invoices->retrieve($invoice_id);
        return $invoice;
    }

    public function retriveAllInvoices($customer_id)
    {
        $invoices = $this->stripe->invoices->all([
            'customer' => $customer_id,
        ]);
        return $invoices;
    }

    public function retriveAllPaymentIntents($customer_id)
    {
        $paymentIntents = $this->stripe->paymentIntents->all([
            'customer' => $customer_id,
        ]);
        return $paymentIntents;
    }

    public function checkoutSummary($customer_id)
    {
        $customer = $this->retriveCustomer($customer_id);
        $subscription = $this->retriveSubscription($customer_id);
        $invoices = $this->retriveAllInvoices($customer_id);
        $paymentIntents = $this->retriveAllPaymentIntents($customer_id);

        $return_args = [
            'customer' => $customer,
            'subscription' => $subscription,
            'invoices' => $invoices,
            'paymentIntents' => $paymentIntents,
        ];

        dd($return_args);

        return $return_args;
    }

    /**
     * Retrieve refund from payment intent
     * @see https://stripe.com/docs/api/terminal/readers/refund_payment?lang=php
     * 
     * @param string $payment_intent
     * @return array
     */
    public function retriveRefund($payment_intent)
    {
        $refunds = $this->stripe->refunds->all([
            'payment_intent' => $payment_intent,
        ]);

        return $refunds->data !== null ? $refunds->data : null;
    }

    public function retriveAllPaymentIntentAndInvoices($customer_id)
    {
        $paymentsIntents = $this->retriveAllPaymentIntents($customer_id);
        $invoices = $this->retriveAllInvoices($customer_id);
        $return_args = [];
        foreach ($paymentsIntents as $paymentIntent) {
            foreach ($invoices as $invoice) {
                if ($paymentIntent->invoice == $invoice->id) {
                    $return_args[] = [
                        'invoice' => $invoice,
                        'paymentIntent' => $paymentIntent,
                        'refund' => $this->retriveRefund($paymentIntent->id),
                    ];
                    continue 2;
                }
            }
            $return_args[] = [
                'paymentIntent' => $paymentIntent,
                'invoice' => null,
                'refund' => $this->retriveRefund($paymentIntent->id),
            ];
        }
        
        return $return_args;
    }

    /**
     * Retrieve delivery address from payment intent
     * 
     * @param string $payment_intent
     * @return array
     */
    public function retriveDeliveryAddress($payment_intent)
    {
        $paymentIntent = $this->stripe->paymentIntents->retrieve(
            $payment_intent,
            []
        );

        return $paymentIntent->shipping->address;
    }

    /**
     * Retrieve delivery phone from payment intent
     * 
     * @param string $payment_intent
     * @return string
     */
    public function retriveDeliveryPhone($payment_intent)
    {
        $paymentIntent = $this->stripe->paymentIntents->retrieve(
            $payment_intent,
            []
        );
        $customer = $this->stripe->customers->retrieve(
            $paymentIntent->customer,
            []
        );

        return $customer->phone;
    }

    /**
     * Expire checkout session
     * 
     * @param string $customer_id
     * @param string $payment_intent
     * 
     * @return void
     */
    public function expireCheckout(string $customer_id, string $payment_intent): void
    {
        $checkout_sessions = $this->stripe->checkout->sessions->all([
            'customer' => $customer_id,
            'payment_intent' => $payment_intent,
        ])->data;

        $this->stripe->refunds->create([
            'payment_intent' => $payment_intent,
        ]);
    }
}