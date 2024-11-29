<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Salle;
use App\Models\Materiel;
use App\Models\Enseigner;
use Illuminate\Http\Request;

class AdminController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $roles = auth()->user()->getRoleNames();
        $user_count = User::count();
        $materiel_count = Materiel::count();
        $salle_count = Salle::count();
        $events = Enseigner::with( 'users' )
        ->with( 'salles' )->with( 'modules' )->get()->map(
            function ( $event ) {
                return [
                    'id' => $event->id,
                    'professeur' => $event->users->nom,
                    'salle' => $event->salles->nom_salle,
                    'module' => $event->modules->nom_module,
                    // 'type' => $event->type_cours,
                    'date' => $event->date_deroulement,
                    'start' => $event->date_deroulement .' '. Carbon::parse( $event->heure_debut )->format( 'H:i' ),
                    'end' =>$event->date_deroulement .' '. Carbon::parse( $event->heure_fin )->format( 'H:i' ),
                    'title' => $event->type_cours . " " . $event->salles->nom_salle,
                ];
            }
        );
        $userList = User::with('roles')->get();
        return Inertia::render( 'Admin/Index',
        compact( 'user_count', 'materiel_count', 'salle_count', 'events', 'roles', 'userList' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
    }
}
