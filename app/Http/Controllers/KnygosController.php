<?php

namespace App\Http\Controllers;

use App\Models\Knyga;
use App\Models\Vartotojas;
use Illuminate\Http\Request;

class KnygosController extends Controller
{
    // Display a list of all books
    public function sarasas($filter = false)
    {
        $knygos = Knyga::query()
            ->atrinkti($filter)
            ->get(); // Fetch books using the scope method

        $username = 'anonymous';

        /** @var Vartotojas $user */
        $user = auth()->user();

        if ( $user) {
            $username = $user->getAttribute('vardas' );
        }

        return view('knygu_sarasas', ['knygos' => $knygos, 'filter' => $filter, 'username' => $username]);
    }


    public function nepaimtuSarasas()
    {
        $nepaimtosKnygos = Knyga::atrinktiNepaimtas()->get(); // Fetch books using the scope method
        return view('knygu_sarasas', compact('nepaimtosKnygos'));
    }

}
