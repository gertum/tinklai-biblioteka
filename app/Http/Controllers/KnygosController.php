<?php

namespace App\Http\Controllers;

use App\Models\Knyga;
use App\Models\Skolinimasis;
use App\Models\Vartotojas;
use Illuminate\Http\Request;

class KnygosController extends Controller
{
    public function sarasas()
    {
        $knygos = Knyga::all();
        return view('knygu_sarasas', ['knygos' => $knygos, 'filter' => false]);
    }

    public function filteredSarasas()
    {
        $knygos = Knyga::query()
            ->atrinkti(true) // Or specify your filter logic here
            ->get();

        return view('knygu_sarasas', ['knygos' => $knygos, 'filter' => true]);
    }



    public function storeBook(Request $request)
    {
        $validatedData = $request->validate([
            'pavadinimas' => 'required|string|max:255',
            'autorius' => 'required|string|max:255',
            'leidimo_metai' => 'required|integer',
            'egzemplioriu_skaicius' => 'required|integer',
        ]);

        // Create a new book based on the validated data
        Knyga::create([
            'pavadinimas' => $validatedData['pavadinimas'],
            'autorius' => $validatedData['autorius'],
            'leidimo_metai' => $validatedData['leidimo_metai'],
            'egzemplioriu_skaicius' => $validatedData['egzemplioriu_skaicius'],
        ]);

        // Redirect to a specific route after successfully storing the book
        return redirect()->route('knygos')->with('success', 'Knyga sėkmingai pridėta!');
    }
    public function trinti($id)
    {
        $book = Knyga::find($id);

        if (!$book) {
            return redirect()->back()->with('error', 'Book not found!');
        }

        // Delete related records first (assuming the foreign key is in 'skolinimaisi' table)
        $book->skolinimaisi()->delete();

        // Then delete the book
        $book->delete();

        return redirect()->back()->with('success', 'Knyga sėkmingai ištrinta!');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'pavadinimas' => 'required|string',
            'autorius' => 'required|string',
            'leidimo_metai' => 'required|integer',
            'egzemplioriu_skaicius' => 'required|integer',
        ]);

        // Create a new book instance
        $book = new Knyga();
        $book->pavadinimas = $validatedData['pavadinimas'];
        $book->autorius = $validatedData['autorius'];
        $book->leidimo_metai = $validatedData['leidimo_metai'];
        $book->egzemplioriu_skaicius = $validatedData['egzemplioriu_skaicius'];

        // Save the book to the database
        $book->save();

        return redirect()->route('knygos')->with('success', 'Knyga sėkmingai pridėta!');
    }
    public function update(Request $request, $id)
    {
        $book = Knyga::find($id);

        if (!$book) {
            return redirect()->back()->with('error', 'Book not found!');
        }

        $validatedData = $request->validate([
            'pavadinimas' => 'required|string',
            'autorius' => 'required|string',
            'leidimo_metai' => 'required|integer',
            'egzemplioriu_skaicius' => 'required|integer',
            // Add other validation rules as needed
        ]);

        $book->update($validatedData);

        return redirect()->route('knygos', ['id' => $id])->with('success', 'Book updated successfully!');
    }
}
