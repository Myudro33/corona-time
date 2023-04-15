<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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

    public function verifyEmail(Request $request, $token)
    {
        // Find the user with the given token
        $user = User::where('verification_token', $token)->first();

        // If the user doesn't exist, return an error
        if (!$user) {
            return abort(404, 'User Not Found');
        }

        // Mark the user's email as verified
        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();

        // Redirect the user to the home page or wherever you want
        return redirect('/confirmed')->with('success', 'Your email has been verified!');
    }
}
