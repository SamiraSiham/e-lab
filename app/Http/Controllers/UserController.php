<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $users = UserResource::collection( User::all() );
        return Inertia::render( 'Users/Index', compact( 'users' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return Inertia::render( 'Users/Create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        // dd( $request->all( . ) );
        $request->validate( [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => [ 'required', 'confirmed', Rules\Password::defaults() ],
        ] );

        $user = User::create( [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
        ] );
        return to_route( 'users.index' );
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
        return Inertia::render( 'Users/Edit', [
            'user' => new UserResource( User::findOrFail( $id ) )
        ] );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        $request->validate( [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|' . Rule::unique( 'users', 'email' )->ignore( $id ),
        ] );

        $user = User::findOrFail( $id );
        $user->update( [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
        ] );
        return to_route( 'users.index' );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        $user = User::findOrFail( $id );
        $user->delete();
        return to_route( 'users.index' );
    }
}
