<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('vardas', 'slaptazodis');


        if (Auth::attempt($credentials)) {
            return redirect()->intended('/'); // Redirect to intended page after login
        } else {

            return back()->withErrors(['vardas' => 'Neteisingi prisijungimo duomenys']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
