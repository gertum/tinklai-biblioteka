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

    public function manoSkolinimaisi()
    {
        // Your logic to fetch the user's loans goes here
        // Fetching user's loans assuming Auth is used for authentication
        $skolinimaisi = Skolinimasis::where('vartotojas_id', auth()->id())->get();

        // Pass the $skolinimaisi data to the view
        return view('skolinimaisi.mano_skolinimaisi', ['skolinimaisi' => $skolinimaisi]);
    }
    public function visiSkolinimaisi()
    {
        // Your logic to fetch the user's loans goes here
        // Fetching user's loans assuming Auth is used for authentication
        $skolinimaisi = Skolinimasis::query()->get();

        // Pass the $skolinimaisi data to the view
        return view('skolinimaisi.visi_skolinimaisi', ['skolinimaisi' => $skolinimaisi]);
    }
    public function zymetiGrazinima(Skolinimasis $skolinimasis) {
        // Update the 'grazinimo_data' attribute for the book
        $skolinimasis->update(['grazinimo_data' => now()]);

        // Redirect back or wherever needed after the update
        return redirect()->back()->with('success', 'Grąžinimas pažymėtas sėkmingai!');
    }

}
