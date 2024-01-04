<?php

namespace App\Http\Controllers;

use App\Models\Knyga;
use Illuminate\Http\Request;

class KnygosController extends Controller
{
    // Display a list of all books
    public function sarasas()
    {
        $knygos = Knyga::all();
        return view('knygu_sarasas', compact('knygos'));
    }
    public function scopeAvailableBooks($query)
    {
        return $query->where('egzemplioriu_skaicius', '>', 0)
            ->whereDoesntHave('skolinimai', function ($query) {
                $query->whereNull('grazinimo_data');
            });
    }
}
