<?php
namespace App\Http\Controllers;

use App\Models\Skolinimasis;
use Illuminate\Http\Request;

class SkolinimaisiController extends Controller
{
public function skolintis(Request $request)
{
$validatedData = $request->validate([
'pradzios_data' => 'required|date',
'pabaigos_data' => 'required|date|after:pradzios_data',
'book_id' => 'required|exists:knygos,id',
'user_id' => 'required|exists:vartotojai,id',
]);

// Create a new loan record based on the validated data
Skolinimasis::create([
'pradzios_data' => $validatedData['pradzios_data'],
'pabaigos_data' => $validatedData['pabaigos_data'],
'vartotojas_id' => $validatedData['user_id'],
'knyga_id' => $validatedData['book_id'],
]);

// Redirect to a specific route after successfully borrowing the book
return redirect()->route('knygos')->with('success', 'Knyga sėkmingai paskolinta!');
}

}
