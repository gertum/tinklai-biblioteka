<?php

namespace App\Http\Controllers;


use App\Models\Zinute;
use Illuminate\Http\Request;

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
            'sender_id' => 'required|exists:vartotojai,id',
            'receiver_id' => 'required|exists:vartotojai,id',
            'tekstas' => 'required',
        ]);

        // Create a new Zinute instance
        $zinute = new Zinute([
            'tekstas' => $request->input('tekstas'),
            'siuncia_vartotojas_id' => $request->input('sender_id'),
            'gauna_vartotojas_id' => $request->input('receiver_id'),
        ]);

        // Save the Zinute to the database
        $zinute->save();

        // You can redirect or do other actions after creating the Zinute
        return redirect()->route('zinutes.index');
    }
}
