<?php

namespace App\Http\Controllers;

use App\Models\Knyga;
use Illuminate\Http\Request;

class KnygosController extends Controller
{
    // Display a list of all books
    public function sarasas($filter = false)
    {
        if ($filter) {
            $knygos = Knyga::atrinktiNepaimtas()->get(); // Fetch books using the scope method
            return view('knygu_sarasas', compact('knygos', 'filter'));
        }

        $knygos = Knyga::all();
        return view('knygu_sarasas', compact('knygos', 'filter'));
    }


    public function nepaimtuSarasas()
    {
        $nepaimtosKnygos = Knyga::atrinktiNepaimtas()->get(); // Fetch books using the scope method
        return view('knygu_sarasas', compact('nepaimtosKnygos'));
    }

}
