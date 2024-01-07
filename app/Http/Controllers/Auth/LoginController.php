<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        DB::enableQueryLog();
        $credentials = $request->only('vardas', 'slaptazodis');

//        $credentials['password']=$credentials['slaptazodis'];
//        $credentials['login']=$credentials['vardas'];
//        $credentials['user']=$credentials['vardas'];

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/'); // Redirect to intended page after login
        } else {
            // Authentication failed
            $queries = DB::getQueryLog();
            Log::debug('Queries executed:', $queries);

            return back()->withErrors(['vardas' => 'Neteisingi prisijungimo duomenys']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
