<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleManages extends Controller
{
    public function roles()
    {
        return view('access-control.roles.index');
    }

    public function rolesData(Request $request)
    {
        $data = Role::all();
        return DataTables::of($data)->make(true);
    }



    public function detail($id)
    {
        $roleData = Role::find($id);
        return view('access-control.roles.detail', compact('roleData'));
    }

    public function create()
    {
        return view('access-control.roles.create');
    }

    public function store(Request $request)
    {
        $permissions = $request->input('permissions');
        $validateData = $request->validate([
            'name' => 'required',
        ]);
        $newRole = Role::create(['name' => $validateData['name']]);
        if($permissions != null){
            $newRole->givePermissionTo($permissions);
        }
        return redirect()->route('roles');
    }

    public function edit(Request $request, $id)
    {
        $oldData = Role::find($id);
        return view('access-control.roles.edit', compact('oldData'));
    }

    public function update(Request $request, $id)
    {
        $permissions = $request->input('permissions');
        $oldData = Role::find($id);
        $validateData = $request->validate([
            'name' => 'required',
        ]);
        $oldData->update($validateData);
        if($permissions != null){
            $oldData->givePermissionTo($permissions);
        }
        return redirect()->route('roles.edit', ['id' => $oldData->id]);
    }

    public function destroy($id)
    {
        $deleteData = Role::find($id);
        $deleteData->delete();
        return redirect()->route('roles');
    }

    public function rolesDontHavePermission(Request $request,$role)
    {
        // Ambil roles yang dimaksud
        $rolesData = Role::findByName($role);
        // Ambil semua role yang tidak memiliki roles tersebut
        $permissionWithoutRoles = Permission::whereDoesntHave('roles', function ($query) use ($rolesData) {
            $query->where('id', $rolesData->id);
        })->get();
        return DataTables::of($permissionWithoutRoles)->make(true);
    }

    public function rolesHasPermission(Request $request,$role)
    {
        // Ambil roles yang dimaksud
        $rolesData = Role::findByName($role);
        // Ambil semua role yang tidak memiliki roles tersebut
        $permissionWithRoles = Permission::whereHas('roles', function ($query) use ($rolesData) {
            $query->where('id', $rolesData->id);
        })->get();
        return DataTables::of($permissionWithRoles)->make(true);
    }
}
