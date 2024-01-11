<?php

namespace App\Http\Controllers;


use App\Models\Vartotojas;
use App\Models\Zinute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// Import the appropriate Message model

class ZinutesController extends Controller
{
    public function index()
    {
        $receivedMessages = Zinute::where('gauna_vartotojas_id', auth()->id())->get(); // Fetch messages for the authenticated user
        $sentMessages = Zinute::where('siuncia_vartotojas_id', auth()->id())->get(); // Fetch messages for the authenticated user
        return view('zinutes.mano_zinutes', [
            'gautosZinutes' => $receivedMessages,
            'issiustosZinutes' => $sentMessages,
        ]);
    }
    public function create(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'siuncia_vartotojas_vardas' => [
                'required',
                Rule::exists('vartotojai', 'vardas'),
            ],
            'gauna_vartotojas_vardas' => [
                'required',
                Rule::exists('vartotojai', 'vardas'),
            ],
            'tekstas' => 'required',
        ], [
            'siuncia_vartotojas_vardas.exists' => 'The sender does not exist.',
            'gauna_vartotojas_vardas.exists' => 'The receiver does not exist.',
        ]);

        // Get user IDs based on the provided names
        $siuncia_vartotojas_id = Vartotojas::where('vardas', $request->input('siuncia_vartotojas_vardas'))->value('id');
        $gauna_vartotojas_id = Vartotojas::where('vardas', $request->input('gauna_vartotojas_vardas'))->value('id');

        // Create a new Zinute instance
        $zinute = new Zinute([
            'tekstas' => $request->input('tekstas'),
            'siuncia_vartotojas_id' => $siuncia_vartotojas_id,
            'gauna_vartotojas_id' => $gauna_vartotojas_id,
        ]);

        // Save the Zinute to the database
        $zinute->save();

        // You can redirect or do other actions after creating the Zinute
        return redirect()->route('zinutes');
    }
}
