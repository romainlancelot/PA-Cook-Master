<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUs extends Controller
{
    public function index()
    {
        // Passer les données à la vue
        return view('contact-us');
    }
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Envoyer l'email de contact
        Mail::to('votre-email@example.com')->send(new ContactMail($request->all()));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
