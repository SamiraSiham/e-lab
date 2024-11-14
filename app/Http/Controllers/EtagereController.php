<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Salle;
use App\Models\Etagere;
use App\Models\Placard;
use Illuminate\Http\Request;

class EtagereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Etagere::with('salle')->with('placard')->get();
        return Inertia::render('Etageres/Index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salles = Salle::all();
        $placards = Placard::all();
        return Inertia::render('Etageres/Create', compact('salles', 'placards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate( 
            [
                'num_etagere' => 'required|max:255',
                'salle_id' => 'required|max:255',
                'placard_id' => 'required|max:255',
            ]);
            $etagere = Etagere::create( [
                'num_etagere' => $request->num_etagere,
                'salle_id' => $request->salle_id,
                'placard_id' => $request->placard_id,
            ] );
            return to_route('etageres.index');
        }catch(ValidationException $e){
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * get placards by salle_id
     */
    public function show(string $id)
    {
        $etagere = Etagere::where('placard_id', '=', $id);
        return response()->json(['etagere' => $etagere]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $salles = Salle::all();
        $placards = Placard::all();
        $etagere = Etagere::findOrFail($id);
        return Inertia::render('Etageres/Edit', compact('placards', 'salles', 'etagere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $etagere = Etagere::findOrFail($id);
        try {
            $request->validate( 
            [
                'num_etagere' => 'required|max:255',
                'salle_id' => 'required|max:255',
                'placard_id' => 'required|max:255',
            ]);
            // dd($request->all());
            $etagere->update( [
                'num_etagere' => $request->num_etagere,
                'salle_id' => $request->salle_id,
                'placard_id' => $request->placard_id,
            ] );
            return to_route('etageres.index');
        }catch(ValidationException $e){
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $etagere = Etagere::findOrFail($id);
        $etagere->delete();
        return to_route('etageres.index');
    }
}
