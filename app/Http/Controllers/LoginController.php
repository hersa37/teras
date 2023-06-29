<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /** Shows the login page if the user is not logged in. If the user is logged in, redirects to the tenant index page.
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('tenant.index');
        }
        return view('auth.login');
    }

    /** Autentikasi user dan mengarahkan ke halaman tenant index jika berhasil.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // Cek apakah nilai id dan password ada di request
        $request->validate([
            'id' => 'required',
            'password' => 'required'
        ]);
        // Ambil nilai id dan password dari request
        $credentials = $request->only('id', 'password');

        // Cek apakah id dan password ada di database menggunakan guard admin
        if (Auth::guard('admin')->attempt([
            'id_admin' => $credentials['id'],
            'password' => $credentials['password']
        ])) {
            // Jika ada, maka buat session dan arahkan ke halaman tenant index
            $request->session()->regenerate();
            return redirect()->route('tenant.index');
        }
        // Jika tidak ada, maka kembali ke halaman login dengan pesan error
        return redirect()->route('login')->withErrors(['id' => 'Incorrect username or password']);
    }

    /** Logout user dan mengarahkan ke halaman login
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        $user = Auth::guard('admin')->user();
        Auth::guard('admin')->logout();
        return redirect()->route('login', ['logged_out' => $user]);
    }

}
