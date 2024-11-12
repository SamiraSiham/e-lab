<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $modules = Module::all();
        return Inertia::render( 'Modules/Index', compact( 'modules' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return Inertia::render( 'Modules/Create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        try {
            $request->validate( 
            [
                'nom_module' => 'required|max:255|unique:modules',
                'num_module' => 'required|max:255|unique:modules',
            ], 
            [
                'nom_module.required' => 'Le nom de module est obligatoire',
                'nom_module.max' => 'Nombre maximal de caractères est dépassé!',
                'nom_module.unique' => 'Ce module déjà existe!',
                'num_module.required' => 'Le numéro de module est obligatoire',
                'num_module.max' => 'Nombre maximal de chiffres est dépassé!',
                'num_module.unique' => 'Ce module déjà existe!',
            ] );
            $module = Module::create( [
                'nom_module' => $request->nom_module,
                'num_module' => $request->num_module,
            ] );
            // return response()->json( [ 'message'=>'Module ajouté avec succès' ] );
            return to_route('modules.index');
        }catch(ValidationException $e){
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $module = DB::table( 'modules' )->where( 'id', $id )->first();
        return response()->json( [ 'module' => $module ] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $module = Module::find( $id );
        // return response( $module );
        return Inertia::render('Modules/Edit', compact('module') );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        try {
            $request->validate( [
                'nom_module' => 'required|max:255',
                'num_module' => 'required|max:255',
            ],[
                'nom_module.required' => 'l\'intitulé de module est obligatoire',
                'intitule_module.max' => 'Nombre maximal de caractères est dépassé!',
                'num_module.required' => 'Le numéro de module est obligatoire',
                'num_module.max' => 'Nombre maximal de chiffres est dépassé!',
            ] );
            $module = DB::table( 'modules' )->where( 'id', $id )->update( [
                'nom_module' => $request->nom_module,
                'num_module' => $request->num_module,
            ] );
            // return response()->json( [ 'message' => 'Module modifié avec succès', 'module' => $module ] );
            return to_route('modules.index');
        } catch( ValidationException $e ) {
            return response()->json( [ 'errors' => $e->errors() ], 422 );
        }
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        $module = DB::table( 'modules' )->where( 'id', $id )->delete( $id );
        // return response()->json( [ 'message' => 'Module supprimé avec succès', 'module' => $module ] );
    }
}
