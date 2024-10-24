<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class PermissionsManages extends Controller
{
    public function permissions(){
        return view('access-control.permissions.index');
    }

    public function permissionsData(Request $request){
        $data = Permission::all();
        return DataTables::of($data)->make(true);
    }

    public function detail($id){
        $permissionData = Permission::find($id);
        return view('access-control.permissions.detail',compact('permissionData'));
    }

    public function create(){
        return view('access-control.permissions.create');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required'
        ]);
        Permission::create(['name' => $validateData['name']]);
        return redirect()->route('permissions');
    }

    public function edit(Request $request,$id){
        $oldData = Permission::find($id);
        return view('access-control.permissions.edit',compact('oldData'));
    }

    public function update(Request $request,$id){
        $roles = $request->input('roles');
        $oldData = Permission::find($id);
        $validateData = $request->validate([
            'name' => 'required'
        ]);
        $oldData->update($validateData);
        if($roles != null){
            $oldData->assignRole($roles);
        }
        return redirect()->route('permissions.edit',['id' => $oldData->id]);
    }

    public function destroy($id){
        $deleteData = Permission::find($id);
        $deleteData->delete();
        return redirect()->route('permissions');
    }

    public function permissionDontHaveRoles(Request $request,$permission)
    {
        // Ambil permission yang dimaksud
        $permissionData = Permission::findByName($permission);
        // Ambil semua role yang tidak memiliki permission tersebut
        $rolesWithoutPermission = Role::whereDoesntHave('permissions', function ($query) use ($permissionData) {
            $query->where('id', $permissionData->id);
        })->get();
        return DataTables::of($rolesWithoutPermission)->make(true);
    }

    public function permissionHasRoles(Request $request,$permission)
    {
        // Ambil permission yang dimaksud
        $permissionData = Permission::findByName($permission);
        // Ambil semua role yang tidak memiliki permission tersebut
        $rolesWithPermission = Role::whereHas('permissions', function ($query) use ($permissionData) {
            $query->where('id', $permissionData->id);
        })->get();
        return DataTables::of($rolesWithPermission)->make(true);
    }

}
