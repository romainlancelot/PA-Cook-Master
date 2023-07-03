<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    static private $DEFAULT_IMAGE_PATH = 'images/users/default.png';

    public function show() 
    {
        if (($stripe_id = auth()->user()->stripe_id) != null) {
            $stripe = new StripeController();
            $payments = $stripe->retriveAllPaymentIntentAndInvoices($stripe_id);

            if (auth()->user()->subscriptionPlan()->first()->price > 0) {
                $subscription = $stripe->retriveSubscription($stripe_id);
            }
        }
        return view('auth.account')->with([
            'payments' => $payments ?? null,
            'subscription' => $subscription ?? null,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->user()->id],
            'phone' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'zip_code' => ['nullable', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = auth()->user();
        $user->update($validator->validated());

        if ($user->stripe_id != null) {
            $stripe = new StripeController();
            $stripe->updateCustomer($user);
        }

        return redirect()->back()->with('success', 'Your account has been updated');
    }

    public function updateProfilePicture(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'removeImage' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if (!isset($request->image) && !isset($request->removeImage)) {
            return redirect()->back()->withErrors(['image' => 'Please select an image']);
        }

        $user = auth()->user();

        if ($user->image != null && $user->image != self::$DEFAULT_IMAGE_PATH) {
            unlink(public_path($user->image));
        }

        if (isset($request->removeImage) && $request->removeImage == 'true') {
            $user->image = self::$DEFAULT_IMAGE_PATH;
            $user->save();
            return redirect()->back()->with('success', 'Your profile picture has been removed');
        }

        $imageName = $user->id . '.' . $request->image->extension();
        $request->image->move(public_path('images/users'), $imageName);
        $user->image = 'images/users/' . $imageName;
        $user->save();

        return redirect()->back()->with('success', 'Your profile picture has been updated');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8',
            'newPasswordConfirmation' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->newPassword != $request->newPasswordConfirmation) {
            return redirect()->back()->withErrors(['newPassword' => 'The new password confirmation does not match']);
        }

        $user = auth()->user();
        if (!password_verify($request->currentPassword, $user->password)) {
            return redirect()->back()->withErrors(['currentPassword' => 'The current password does not match']);
        }

        $user->password = $request->newPassword;
        $user->save();

        $user->tokens()->delete();
        auth()->logout();

        return redirect()->route('login')->with('success', 'Your password has been updated');
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if (!password_verify($request->password, auth()->user()->password)) {
            return redirect()->back()->withErrors(['password' => 'The password does not match']);
        }

        $user = auth()->user();
        $user->destroy($user->id);
        $user->tokens()->delete();
        auth()->logout();

        return redirect()->route('login')->with('success', 'Your account has been deleted');
    }
}
