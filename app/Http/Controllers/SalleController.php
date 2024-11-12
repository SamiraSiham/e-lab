<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = Salle::all();
        return Inertia::render('Salles/Index' , compact('salles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Salles/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate( 
            [
                'nom_salle' => 'required|max:255|unique:salles',
                'num_salle' => 'required|max:255|unique:salles',
            ], 
            [
                'nom_salle.required' => 'Le nom de salle est obligatoire',
                'nom_salle.max' => 'Nombre maximal de caractères est dépassé!',
                'nom_salle.unique' => 'Cette salle déjà existe!',
                'num_salle.required' => 'Le numéro de salle est obligatoire',
                'num_salle.max' => 'Nombre maximal de chiffres est dépassé!',
                'num_salle.unique' => 'Cette salle déjà existe!',
            ] );
            $salle = Salle::create( [
                'nom_salle' => $request->nom_salle,
                'num_salle' => $request->num_salle,
            ] );
            // return response()->json( [ 'message'=>'salle ajouté avec succès' ] );
            return to_route('salles.index');
        }catch(ValidationException $e){
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salle = DB::table( 'salles' )->where( 'id', $id )->first();
        return response()->json( [ 'salle' => $salle ] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $salle = Salle::findOrFail($id);
        return Inertia::render('Salles/Edit', compact('salle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate( [
                'nom_salle' => 'required|max:255',
                'num_salle' => 'required|max:255',
            ],[
                'nom_salle.required' => 'l\'intitulé de salle est obligatoire',
                'intitule_salle.max' => 'Nombre maximal de caractères est dépassé!',
                'num_salle.required' => 'Le numéro de salle est obligatoire',
                'num_salle.max' => 'Nombre maximal de chiffres est dépassé!',
            ] );
            $salle = DB::table( 'salles' )->where( 'id', $id )->update( [
                'nom_salle' => $request->nom_salle,
                'num_salle' => $request->num_salle,
            ] );
            // return response()->json( [ 'message' => 'salle modifié avec succès', 'salle' => $salle ] );
            return to_route('salles.index');
        } catch( ValidationException $e ) {
            return response()->json( [ 'errors' => $e->errors() ], 422 );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $salle = DB::table( 'salles' )->where( 'id', $id )->delete( $id );
    }
}
