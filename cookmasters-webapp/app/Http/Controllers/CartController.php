<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\CookingRecipes;
use App\Models\Transactions;
use App\Models\Workshop;
use Exception;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cart.index')->with([
            'cart' => session()->get('cart', []),
            'subtotal' => $this->subtotal()
        ]);
    }

    public function success()
    {
        return view('cart.success');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
            'equipment_id' => 'nullable|exists:equipment,id',
            'recipe_id' => 'nullable|exists:cooking_recipes,id',
            'workshop_id' => 'nullable|exists:workshops,id',
        ]);

        if (!isset($validatedData['equipment_id']) && !isset($validatedData['recipe_id']) && !isset($validatedData['workshop_id'])) {
            return redirect()->route('cart.index')->withErrors([
                'error' => 'No product selected!'
            ]);
        }

        if (isset($validatedData['equipment_id'])) {
            $equipment = Equipment::findOrFail($validatedData['equipment_id']);
        }
        if (isset($validatedData['recipe_id'])) {
            $equipment = CookingRecipes::findOrFail($validatedData['recipe_id']);
        }
        if (isset($validatedData['workshop_id'])) {
            $equipment = Workshop::findOrFail($validatedData['workshop_id']);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$equipment->id])) {
            if ($cart[$equipment->id]['quantity'] + $validatedData['quantity'] > $equipment->availablequantity) {
                $cart[$equipment->id]['quantity'] = $equipment->availablequantity;
                return redirect()->route('cart.index')->withErrors([
                    'availablequantity' => 'The available quantity is exceeded!'
                ]);
            }
            $cart[$equipment->id]['quantity'] += $validatedData['quantity'];
        } else {
            $cart[$equipment->id] = [
                'quantity' => $validatedData['quantity'],
                'equipment' => $equipment
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Equipment added to cart successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);
        
        if (isset($cart[$id]['equipment'])) {
            $equipment = $cart[$id]['equipment'];
            $availablequantity = $cart[$id]['equipment']->availablequantity;
        }
        if (isset($cart[$id]['recipe'])) {
            $equipment = $cart[$id]['recipe'];
            $availablequantity = $cart[$id]['recipe']->availablequantity;
        }

        if ($validatedData['quantity'] > $availablequantity && !isset($cart[$id]['workshop'])) {
            $cart[$id]['quantity'] = $availablequantity;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->withErrors([
                'availablequantity' => 'The available quantity is exceeded ' . $cart[$id]['equipment']->availablequantity . ' in stock!'
            ]);
        }

        $cart[$id]['quantity'] = $validatedData['quantity'];
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $validatedData = [
            'quantity' => 'required|integer|min:1'
        ];

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Equipment removed from cart successfully!');
        }

        return redirect()->route('cart.index')->withErrors([
            'error' => 'Equipment not found in cart!'
        ]);
    }

    public function subtotal()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;

        foreach ($cart as $equipment) {
            $subtotal += $equipment['equipment']->price * $equipment['quantity'];
        }

        return $subtotal;
    }

    public function clear()
    {
        session()->remove('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect()->route('cart.index')->withErrors([
                'error' => 'Cart is empty!'
            ]);
        }


        // format cart
        foreach ($cart as $equipment) {
            if (isset($cart['equipment']))  { $equipment = $cart['equipment']; }
            if (isset($cart['recipe']))     { $equipment = $cart['recipe']; }
            $order[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $equipment['equipment']->price * 100,
                    'product_data' => [
                        'name' => $equipment['equipment']->name,
                    ],
                ],
                'quantity' => $equipment['quantity'],
            ];
        }

        // dd($order);

        $stripe = new StripeController();
        $session = $stripe->createSession($order);

        if ($session) {
            return redirect()->to($session->url);
        } else {
            return redirect()->route('cart.index')->withErrors([
                'error' => 'Checkout failed!'
            ]);
        }
    }

    public function check(Request $request)
    {
        try {
            $stripe = new StripeController();
            if (!($session = $stripe->retriveSession($request->session_id))) {
                return redirect()->back()->withErrors(['error' => 'Stripe session not found please contact support.']);
            }

            if (!($user = User::where('stripe_id', $session->customer)->first())) {
                return redirect()->back()->withErrors(['error' => 'User not found please contact support.']);
            }

            $cart = session()->get('cart', []);

            if ($this->subtotal() != $session->amount_total / 100) {
                return redirect()->back()->withErrors(['error' => 'Amounts are not same please contact support.']);
            }

            foreach ($cart as $equipment) {
                $transaction = Transactions::create([
                    'user_id' => $user->id,
                    'quantity' => $equipment['quantity'],
                    'price' => $equipment['equipment']->price,
                    'stripe_payment_intent_id' => $session->payment_intent,
                ]);
                if ($equipment['equipment'] instanceof Equipment) {
                    $transaction->equipment_id = $equipment['equipment']->id;
                }
                if ($equipment['equipment'] instanceof CookingRecipes) {
                    $transaction->cooking_recipe_id = $equipment['equipment']->id;
                }
                $transaction->save();

                $equipment['equipment']->availablequantity -= $equipment['quantity'];
                $equipment['equipment']->save();
            }

            $transaction = Transactions::where('user_id', auth()->user()->id)
                ->where('created_at', $transaction->created_at)
                ->get();

            Mail::to(auth()->user()->email)->send(new OrderConfirmation($transaction, $this->subtotal()));

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('cart.index')->with('success', 'Checkout successfully!');
    }

    public function invoice($transaction)
    {
        try {
            $transaction = Transactions::where('stripe_payment_intent_id', $transaction)->get();
            if ($transaction->count() == 0) {
                throw new Exception('Transaction not found!');
            }
        } catch (Exception $e) {
            return redirect()->route('account.show')->withErrors([
                'error' => $e->getMessage()
            ]);
        }

        $subtotal = 0;
        foreach ($transaction as $item) {
            $subtotal += $item->price * $item->quantity;
        }

        $pdf = PDF::setOptions([
            'dpi' => 150,
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'isPhpEnabled' => true,
            'isJavascriptEnabled' => true,
        ]);
        
        $pdf->loadView('PDF.invoice', [
            'transaction' => $transaction,
            'user' => auth()->user(),
            'subtotal' => $subtotal,
        ]);

        return $pdf->download('invoice.pdf');
    }
}
