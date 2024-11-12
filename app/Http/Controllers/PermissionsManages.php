<?php

namespace App\Http\Controllers;

use App\Models\SubWebsite;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class PermissionsManages extends Controller
{
    private function sinkron_status()
    {
        SubWebsite::query()->update(['status' => false]);
    }
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
        $roles = $request->input('roles');
        $validateData = $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        $newPermission = Permission::create(['name' => $validateData['name']]);
        if($roles != null){
            $newPermission->syncRoles($roles);
        }
        $this->sinkron_status();
        return redirect()->route('permissions');
    }

    public function edit(Request $request,$id){
        $oldData = Permission::find($id);
        return view('access-control.permissions.edit',compact('oldData'));
    }

    public function update(Request $request,$id){
        $oldData = Permission::find($id);
        $roles = $request->input('roles');
        $validateData = $request->validate([
            'name' => 'required'
        ]);
        $oldData->update($validateData);
        if($roles != null){
            $oldData->syncRoles($roles);
        }
        $this->sinkron_status();
        return redirect()->route('permissions.detail',['id' => $oldData->id]);
    }

    public function destroy($id){
        $deleteData = Permission::find($id);
        $deleteData->delete();
        $this->sinkron_status();
        return redirect()->route('permissions');
    }

    public function permissionDontHaveRoles(Request $request,$permission)
    {
         // Ambil permission berdasarkan nama
        $permissions = Permission::where('name', $permission)->first();

        // Ambil semua role
        $roles = Role::all();

        // Tambahkan informasi jika role sudah memiliki permission ini
        $roles = $roles->map(function ($role) use ($permissions) {
            $role->has_permission = $role->hasPermissionTo($permissions->name);
            return $role;
        });

        return datatables()->of($roles)->make(true);
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
