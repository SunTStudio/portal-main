<?php

namespace App\Http\Controllers;

use App\Models\SubWebsite;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleManages extends Controller
{
    private function sinkron_status()
    {
        SubWebsite::query()->update(['status' => false]);
    }
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
            'name' => 'required|unique:roles,name',
        ]);
        $newRole = Role::create(['name' => $validateData['name']]);
        if ($permissions != null) {
            $newRole->givePermissionTo($permissions);
        }
        $this->sinkron_status();
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
        if ($permissions != null) {
            $oldData->syncPermissions($permissions);
        }
        $this->sinkron_status();
        return redirect()->route('roles.edit', ['id' => $oldData->id]);
    }

    public function destroy($id)
    {
        $deleteData = Role::find($id);
        $deleteData->delete();
        $this->sinkron_status();
        return redirect()->route('roles');
    }

    public function rolesDontHavePermission(Request $request, $role)
    {
        // Ambil roles yang dimaksud
        $rolesData = Role::findByName($role);

        // Ambil permission all data
        $permissionsData = Permission::all();

        // Cek apakah role ter-assign ke setiap permission
        $permissionsData = $permissionsData->map(function ($permission) use ($rolesData) {
            // Periksa apakah permission ini dimiliki oleh role tersebut
            $permission->has_roles = $permission->roles->contains($rolesData);
            return $permission;
        });

        return DataTables::of($permissionsData)->make(true);
    }

    public function rolesHasPermission(Request $request, $role)
    {
        // Ambil roles yang dimaksud
        $rolesData = Role::findByName($role);
        // Ambil semua role yang tidak memiliki roles tersebut
        $permissionWithRoles = Permission::whereHas('roles', function ($query) use ($rolesData) {
            $query->where('id', $rolesData->id);
        })->get();
        return DataTables::of($permissionWithRoles)->make(true);
    }

    public function insertRoleToUsers(Request $request, $role)
    {
        // Ambil semua pengguna
        $users = User::with('department')->get();
        $roleData = Role::findByName($role);
        if ($request->ajax()) {
            // Filter dan tambahkan has_roles
            $usersWithRole = $users->map(function ($user) use ($role) {
                $user->has_roles = $user->hasRole($role);
                return $user;
            });

            return datatables()->of($usersWithRole)->make(true);
        }

        return view('access-control.roles.insertToUsers', compact('roleData'));
    }

    public function storeRoleToUsers(Request $request, $role)
    {
        $roleName = Role::findByName($role);
        $userRoleResets = User::all();
        // Ambil ID pengguna dari input
        $userIds = $request->input('users');
        foreach($userRoleResets as $userRoleReset){
            $userRoleReset->removeRole($roleName);
        }
        // Loop melalui ID pengguna dan tambahkan role
        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
                $user->assignRole($roleName);
            }
        }

        $this->sinkron_status();
        return redirect()->back()->with('success', 'role berhasil dimasukan ke users!');
    }
}
