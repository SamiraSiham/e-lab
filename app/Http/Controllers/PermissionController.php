<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\PermissionResource;
use App\Http\Requests\CreatePermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = PermissionResource::collection(Permission::all());
        return Inertia::render('Permissions/Index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render( 'Permissions/Create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePermissionRequest $request)
    {
        Permission::create( [ 'name' => $request->name ] );
        return to_route( 'permissions.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::findOrFail( $id );
        return Inertia::render( 'Permissions/Edit', [
            'permission' => new PermissionResource( $permission )
        ] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePermissionRequest $request, string $id)
    {
        $permission = Permission::findOrFail( $id );
        $permission->update( $request->validated() );
        return to_route( 'permissions.index' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail( $id );
        $permission->delete();
        return to_route( 'permissions.index' );
    }
}
