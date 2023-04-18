<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class VerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $password = $request->password;
        $user = User::where('email', $request->username)
            ->orWhere('username', $request->username)
            ->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                if ($user->email_verified_at === null) {
                    return redirect('/confirmation');
                }
            } else {
                return back()->withErrors(['password' => __('login.wrong_password')]);
            }
        }
        return $next($request);
    }
}
