<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Vartotojas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function showLibrarianRegisterForm()
    {
        return view('auth.register_librarian');
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

    public function register(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'vardas' => 'required|string|max:255|unique:vartotojai,vardas',
            'slaptazodis' => 'required|string|min:8|confirmed', // Ensure slaptazodis matches slaptazodis_confirmation
            // Add any other fields you have in your registration form
        ]);
        $role = Role::where('pavadinimas', 'Lankytojas')->first();

        // Create a new user based on the validated data
        $user = Vartotojas::create([
            'vardas' => $validatedData['vardas'],
            'slaptazodis' => Hash::make($validatedData['slaptazodis']),
            'role_id' => $role->id,
        ]);

        return redirect()->route('login')->with('success', 'Registracija sėkminga! Prisijunkite.');

    }

    public function registerLibrarian(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'vardas' => 'required|string|max:255|unique:vartotojai,vardas',
            'slaptazodis' => 'required|string|min:8|confirmed', // Ensure slaptazodis matches slaptazodis_confirmation
            // Add any other fields you have in your registration form
        ]);
        $role = Role::where('pavadinimas', 'Bibliotekininkas')->first();

        // Create a new user based on the validated data
        $user = Vartotojas::create([
            'vardas' => $validatedData['vardas'],
            'slaptazodis' => Hash::make($validatedData['slaptazodis']),
            'role_id' => $role->id,
        ]);

        return redirect()->route('knygos')->with('success', 'Bibliotekininko registracija sėkminga!');

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
