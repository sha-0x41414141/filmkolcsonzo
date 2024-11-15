<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;

class RentController extends Controller
{
    public function index()
    {
        $rents = Rent::all()->whereNull('rent_end');
        return view('rents.index', compact('rents'));
    }

    public function show(Request $request)
    {
        $rents = Rent::query();
        if (isset($request->film_title))
        {
            $rents->where("film_title", "like", $request->film_title);
        }
        else if (isset($request->film_director))
        {
            $rents->where("film_director", "like", $request->film_title);
        }else if (isset($request->film_director))
        {
            $rents->where("film_director", "like", $request->film_title);
        }
        return view('rents.show', compact('rents'));
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
            'rent_end' => 'required|date|max:255'
        ]);


        $rent = Rent::findOrFail($id);

        if ($rent->rent_start > $request->rent_end)
        {
            return redirect()->back()->with('error', "Rent end can't be before rent start.");
        }
        $rent->rent_end = $request->rent_end;
        $rent->save();

        return redirect()->back()->with('success', 'Rent updated.');
    }
}
