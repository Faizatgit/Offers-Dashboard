<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function index()
    {
        $offers = Offer::latest()->get();
        return view('offers.index', compact('offers'));
    }

    public function create()
    {
        return view('offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'expiry_date' => 'required|date'
        ]);

        Offer::create([
            'title' => $request->title,
            'description' => $request->description,
            'expiry_date' => $request->expiry_date,
            'active' => $request->is_active
        ]);

        return redirect('/')->with('success','Offer Added');
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect('/')->with('success', 'Offer deleted successfully');
    }

}