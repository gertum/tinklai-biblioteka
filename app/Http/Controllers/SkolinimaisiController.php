<?php
namespace App\Http\Controllers;

use App\Models\Skolinimasis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkolinimaisiController extends Controller
{
    public function skolintis(Request $request, $knygosId)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Calculate date values
        $startDate = now()->toDateString(); // Today's date
        $endDate = now()->addMonth()->toDateString(); // One month from now

        // Create a new loan record based on the calculated data
        Skolinimasis::create([
            'pradzios_data' => $startDate,
            'pabaigos_data' => $endDate,
            'vartotojas_id' => $userId,
            'knyga_id' => $knygosId,
        ]);

        // Redirect to a specific route after successfully borrowing the book
        return redirect()->route('knygos')->with('success', 'Knyga sėkmingai paskolinta!');
    }

}
