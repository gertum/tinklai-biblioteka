<?php

namespace App\Http\Controllers;


use App\Models\Zinute; // Import the appropriate Message model

class ZinutesController extends Controller
{
    public function index()
    {
        $userMessages = Zinute::where('gauna_vartotojas_id', auth()->id())->get(); // Fetch messages for the authenticated user
        return view('zinutes.mano_zinutes', ['zinutes' => $userMessages]);
    }
}
