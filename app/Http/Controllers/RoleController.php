<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Resources\RoleResource;
use App\Http\Requests\CreateRoleRequest;

class RoleController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $roles = RoleResource::collection( Role::all() );
        return Inertia::render( 'Roles/Index', compact( 'roles' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return Inertia::render( 'Roles/Create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( CreateRoleRequest $request ) {
        Role::create( [ 'name' => $request->name ] );
        return to_route( 'roles.index' );
        // dd( $request->name );
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
        $role = Role::findOrFail( $id );
        return Inertia::render( 'Roles/Edit', [
            'role' => new RoleResource( $role )
        ] );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( CreateRoleRequest $request, string $id ) {
        $role = Role::findOrFail( $id );
        $role->update( $request->validated() );
        return to_route( 'roles.index' );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        $role = Role::findOrFail( $id );
        $role->delete();
        return to_route( 'roles.index' );
    }
}
