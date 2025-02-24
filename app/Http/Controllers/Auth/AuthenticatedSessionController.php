<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('frontend.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

                 // Check if email is verified
                 
                //  if (!$request->user()->hasVerifiedEmail()) {
                //     Auth::logout(); 
                //     session()->flash('email_verification_required', true);
                //     return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
                // }
    
            
                if ($request->user()->role === 'admin') {
                    return redirect()->route('admin.dashboard'); // Admin dashboard route
                } else {
                    return redirect()->route('frontend.home'); // User dashboard route
                }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
