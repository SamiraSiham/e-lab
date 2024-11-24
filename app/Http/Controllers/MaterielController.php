<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Salle;
use App\Models\Etagere;
use App\Models\Placard;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterielController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $data = Materiel::with( 'salle' )->with( 'placard' )->with( 'etagere' )->paginate( 5 );
        return Inertia::render( 'Materiels/Index', compact( 'data' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        $salles = Salle::all();
        $placards = Placard::all();
        $etageres = Etagere::all();
        return Inertia::render( 'Materiels/Create', compact( 'salles', 'placards', 'etageres' ) );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        // dd( $request->all() );
        try {
            $request->validate( [
                'index_fp_vf' => 'required',
                'cab' => 'required',
                'famille' => 'required',
                'sous_famille' => 'required',
                'designation' => 'required',
                'quantite' => 'required',
                'prix_unitaire' => 'required',
                'marque' => 'required',
                'modele' => 'required',
                'num_serie' => 'required',
                'dimensions' => 'required',
                'etat' => 'required',
                'date_achat' => 'required',
                'commentaire' => 'required',
                'salle_id' => 'required',
                'placard_id' => 'required',
                'etagere_id' => 'required',
                'image' => 'required|max:102400|image|mimes:jpeg,jpg,png,gif', //100mb maximum size
            ] );
            if ( $request->hasFile( 'image' ) ) {
                $path = $request->file( 'image' )->store( 'materiels', 'public' );
                $mat = Materiel::create( [
                    'index_fp_vf' => $request->index_fp_vf,
                    'cab' => $request->cab,
                    'famille' => $request->famille,
                    'sous_famille' => $request->sous_famille,
                    'designation' => $request->designation,
                    'quantite' => $request->quantite,
                    'prix_unitaire' => $request->prix_unitaire,
                    'marque' => $request->marque,
                    'modele' => $request->modele,
                    'num_serie' => $request->num_serie,
                    'dimensions' => $request->dimensions,
                    'etat' => $request->etat,
                    'date_achat' => $request->date_achat,
                    'commentaire' => $request->commentaire,
                    'salle_id' => $request->salle_id,
                    'placard_id' => $request->placard_id,
                    'etagere_id' =>$request->etagere_id,
                    'image' => $path,
                ] );
                return to_route( 'materiels.index' );
            } else {
                $mat = Materiel::create( [
                    'index_fp_vf' => $request->index_fp_vf,
                    'cab' => $request->cab,
                    'famille' => $request->famille,
                    'sous_famille' => $request->sous_famille,
                    'designation' => $request->designation,
                    'quantite' => $request->quantite,
                    'prix_unitaire' => $request->prix_unitaire,
                    'marque' => $request->marque,
                    'modele' => $request->modele,
                    'num_serie' => $request->num_serie,
                    'dimensions' => $request->dimensions,
                    'etat' => $request->etat,
                    'date_achat' => $request->date_achat,
                    'commentaire' => $request->commentaire,
                    'salle_id' => $request->salle_id,
                    'placard_id' => $request->placard_id,
                    'etagere_id' =>$request->etagere_id,
                ] );
                return to_route( 'materiels.index' );
            }
        } catch ( ValidationException $e ) {
            return response()->json( [ 'errors' => $e->errors() ], 422 );
        }
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        $materiel = Materiel::findOrFail( $id );
        if($materiel->image != ""){
            $image = asset('storage/'.$materiel->image);
        }else{
            $image = null;
        }
        // dd($image);
        $salle = Salle::where('id', $materiel->salle_id)->first();
        $placard = Placard::where('id', $materiel->placard_id)->first();
        $etagere = Etagere::where('id', $materiel->etagere_id)->first();
        // if(isset($materiel->image)){
        //     $image = asset('storage/'.$materiel->image);
        // }else{
        //     $image = null;
        // }
        return Inertia::render( 'Materiels/Show', compact( 'materiel', 'image', 'salle', 'placard', 'etagere' ) );
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        $materiel = Materiel::findOrFail( $id );
        $oldimage = asset('storage/'.$materiel->image);
        $salles = Salle::all();
        $placards = Placard::all();
        $etageres = Etagere::all();
        return Inertia::render( 'Materiels/Edit', compact( 'materiel' ,'salles', 'placards', 'etageres', 'oldimage' ) );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        // dd($request->all());
        $materiel = Materiel::findOrFail($id);
        try {
            $request->validate( [
                'index_fp_vf' => 'required',
                'cab' => 'required',
                'famille' => 'required',
                'sous_famille' => 'required',
                'designation' => 'required',
                'quantite' => 'required',
                'prix_unitaire' => 'required',
                'marque' => 'required',
                'modele' => 'required',
                'num_serie' => 'required',
                'dimensions' => 'required',
                'etat' => 'required',
                'date_achat' => 'required',
                'commentaire' => 'required',
                'salle_id' => 'required',
                'placard_id' => 'required',
                'etagere_id' => 'required',
                'image' => 'required|max:102400|image|mimes:jpeg,jpg,png,gif', //100mb maximum size
            ] );
            if ( $request->hasFile( 'image' ) ) {
                $oldimage = $materiel->image;
                Storage::delete( $oldimage );
                $path = $request->file( 'image' )->store( 'materiels', 'public' );
                $materiel->update( [
                    'index_fp_vf' => $request->index_fp_vf,
                    'cab' => $request->cab,
                    'famille' => $request->famille,
                    'sous_famille' => $request->sous_famille,
                    'designation' => $request->designation,
                    'quantite' => $request->quantite,
                    'prix_unitaire' => $request->prix_unitaire,
                    'marque' => $request->marque,
                    'modele' => $request->modele,
                    'num_serie' => $request->num_serie,
                    'dimensions' => $request->dimensions,
                    'etat' => $request->etat,
                    'date_achat' => $request->date_achat,
                    'commentaire' => $request->commentaire,
                    'salle_id' => $request->salle_id,
                    'placard_id' => $request->placard_id,
                    'etagere_id' =>$request->etagere_id,
                    'image' => $path,
                ] );
                return to_route( 'materiels.index' );
            } else {
                $materiel->update( [
                    'index_fp_vf' => $request->index_fp_vf,
                    'cab' => $request->cab,
                    'famille' => $request->famille,
                    'sous_famille' => $request->sous_famille,
                    'designation' => $request->designation,
                    'quantite' => $request->quantite,
                    'prix_unitaire' => $request->prix_unitaire,
                    'marque' => $request->marque,
                    'modele' => $request->modele,
                    'num_serie' => $request->num_serie,
                    'dimensions' => $request->dimensions,
                    'etat' => $request->etat,
                    'date_achat' => $request->date_achat,
                    'commentaire' => $request->commentaire,
                    'salle_id' => $request->salle_id,
                    'placard_id' => $request->placard_id,
                    'etagere_id' =>$request->etagere_id,
                ] );
                return to_route( 'materiels.index' );
            }
        } catch ( ValidationException $e ) {
            return response()->json( [ 'errors' => $e->errors() ], 422 );
        }
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        $mat = Materiel::findOrFail($id);
        $mat->delete();
        return to_route('materiels.index');
    }
}
