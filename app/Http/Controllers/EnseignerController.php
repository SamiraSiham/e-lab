<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Salle;
use App\Models\Module;
use App\Models\Enseigner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Request as authRequest;

class EnseignerController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $data = Enseigner::with( 'salles' )->with( 'modules' )->with( 'users' )->get();
        // return response()->json( [ 'data' => $data ] );
        return Inertia::render( 'Enseigner/Index', compact( 'data' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        $salles = Salle::all();
        $modules = Module::all();
        $user = authRequest::user();
        return Inertia::render( 'Enseigner/Create', compact( 'salles', 'modules', 'user' ) );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        // dd( $request->all() );
        try {
            $request->validate( [
                'salle_id' => 'required',
                'module_id' => 'required',
                'user_id' => 'required',
                'type_cours' => 'required',
                'date_deroulement' => [ 'required', 'date' ],
                'heure_debut' => 'required|date_format:H:i',
                'heure_fin' => 'required|date_format:H:i|after:heure_debut',
                'support' => 'file|max:102400', //100mb maximum size
            ] );
            if ( $request->hasFile( 'support' ) ) {
                $path = $request->file( 'support' )->store( 'supports', 'public' );
                $fiche = Enseigner::create( [
                    'salle_id' => $request->salle_id,
                    'module_id' => $request->module_id,
                    'user_id' => $request->user_id,
                    'type_cours' => $request->type_cours,
                    'date_deroulement' => $request->date_deroulement,
                    'heure_debut' => $request->heure_debut,
                    'heure_fin' => $request->heure_fin,
                    'support' => $path,
                ] );
                return to_route( 'enseigner.index' );
            }else{
                $fiche = Enseigner::create( [
                    'salle_id' => $request->salle_id,
                    'module_id' => $request->module_id,
                    'user_id' => $request->user_id,
                    'type_cours' => $request->type_cours,
                    'date_deroulement' => $request->date_deroulement,
                    'heure_debut' => $request->heure_debut,
                    'heure_fin' => $request->heure_fin,
                ] );
                return to_route( 'enseigner.index' );
            }
        }catch ( ValidationException $e ) {
            return response()->json( [ 'errors' => $e->errors() ], 422 );
        }
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        $file = Enseigner::findOrFail( $id )->Support;
        // dd($file);
        if (!Storage::disk('public')->exists($file)) {
            abort(404); // Return a 404 error if the file does not exist
        }else{
            $path = Storage::disk('public')->path($file);
            return Response::file($path);
        }
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        $ens = Enseigner::findOrFail($id);
        $salles = Salle::all();
        $modules = Module::all();
        $user = authRequest::user();
        return Inertia::render( 'Enseigner/Edit', compact( 'salles', 'modules', 'user' , 'ens' ) );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        $ens = Enseigner::findOrFail($id);
        // dd($request->all());
        try {
            $request->validate( [
                'salle_id' => 'required',
                'module_id' => 'required',
                'user_id' => 'required',
                'type_cours' => 'required',
                'date_deroulement' => [ 'required', 'date' ],
                'heure_debut' => 'required|date_format:H:i',
                'heure_fin' => 'required|date_format:H:i|after:heure_debut',
                'support' => 'nullable|file|max:102400', # 100mb maximum sizes
            ] );
            if ( $request->hasFile( 'support' ) ) {
                $oldPath = $ens->Support;
                Storage::delete($oldPath);
                $path = $request->file( 'support' )->store( 'supports', 'public' );
                $ens->update( [
                    'salle_id' => $request->salle_id,
                    'module_id' => $request->module_id,
                    'user_id' => $request->user_id,
                    'type_cours' => $request->type_cours,
                    'date_deroulement' => $request->date_deroulement,
                    'heure_debut' => $request->heure_debut,
                    'heure_fin' => $request->heure_fin,
                    'support' => $path,
                ] );
                return to_route( 'enseigner.index' );
            }else{
                $ens->update( [
                    'salle_id' => $request->salle_id,
                    'module_id' => $request->module_id,
                    'user_id' => $request->user_id,
                    'type_cours' => $request->type_cours,
                    'date_deroulement' => $request->date_deroulement,
                    'heure_debut' => $request->heure_debut,
                    'heure_fin' => $request->heure_fin,
                ] );
                return to_route( 'enseigner.index' );
            }
        }catch ( ValidationException $e ) {
            return response()->json( [ 'errors' => $e->errors() ], 422 );
        }
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        $record = Enseigner::findOrFail( $id );
        $record->delete();
        return to_route('enseigner.index');
    }
}
