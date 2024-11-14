<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Salle;
use App\Models\Placard;
use Illuminate\Http\Request;

class PlacardController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $data = Placard::with('salle')->get();
        return Inertia::render( 'Placards/Index', compact( 'data' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        $salles = Salle::all();
        return Inertia::render( 'Placards/Create', compact('salles') );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        // dd($request->all());
        try {
            $request->validate( 
            [
                'num_placard' => 'required|max:255|unique:placards',
                'type' => 'required|max:255',
                'salle_id' => 'required|max:255',
            ]);
            $placard = Placard::create( [
                'num_placard' => $request->num_placard,
                'type' => $request->type,
                'salle_id' => $request->salle_id,
            ] );
            // return response()->json( [ 'message'=>'salle ajouté avec succès' ] );
            return to_route('placards.index');
        }catch(ValidationException $e){
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        $placard = Placard::findOrFail($id);
        return response()->json(['placard', $placard]);
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        $salles = Salle::all();
        $placard = Placard::findOrFail($id);
        return Inertia::render('Placards/Edit', compact('placard', 'salles'));
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        $placard = Placard::findOrFail($id);
        // dd($request->all(),$placard);
        try {
            $request->validate( 
            [
                'num_placard' => 'required|max:255|unique:placards',
                'salle_id' => 'required|max:255',
                'type' => 'required|max:255',
            ]);
            // dd($request->all());
            $placard->update( [
                'num_placard' => $request->num_placard,
                'salle_id' => $request->salle_id,
                'type' => $request->type,
            ] );
            return to_route('placards.index');
        }catch(ValidationException $e){
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        $placard = Placard::findOrFail($id);
        $placard->delete();
        return to_route('placards.index');
    }
}
