<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class VerificationController extends Controller
{
    public function view(): View
    {
        return view('pages.confirmation');
    }
    public function show(): View
    {
        return view('pages.confirmed');
    }

    public function verifyEmail($token): RedirectResponse
    {
        // Find the user with the given token
        $user = User::where('verification_token', $token)->firstOrFail();
        // Mark the user's email as verified
        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();

        // Redirect the user to the home page or wherever you want
        return redirect('/confirmed');
    }
}
