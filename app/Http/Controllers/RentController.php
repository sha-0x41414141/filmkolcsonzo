<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;

class RentController extends Controller
{
    public function index()
    {
        $rents = Rent::all();
        return view('rents.index', compact('rents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'renter' => 'required|string|max:255',
            'rent_start' => 'required|date',
            'film_id' => 'required|integer|exists:films,id'
        ]);

        Rent::create([
            'renter' => $request->renter,
            'film_id' => $request->film_id,
            'rent_start' => $request->rent_start,
        ]);

        return redirect()->route('films.index')->with('success', 'Film rented.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rent_end' => 'required|string|max:255'
        ]);

        $rent = Rent::findOrFail($id);
        
    }
}
