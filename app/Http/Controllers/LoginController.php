<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('id', 'password');

        if (Auth::guard('admin')->attempt([
            'id_admin' => $credentials['id'],
            'password' => $credentials['password']
        ])) {
            $request->session()->regenerate();
            return redirect()->route('admin/dashboard');
        }

        return redirect()->route('login')->withErrors(['id' => 'username']);
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }

}
