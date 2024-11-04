<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function getUserRoles($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $roles = $user->roles->pluck('name'); // Ambil nama role
        $roles_colection = $user->roles;
        return response()->json([
            'roles' => $roles,
            'roles_colection' => $roles_colection,
        ]);
    }

    public function getUserPermissions(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $permissions = $user->getAllPermissions()->pluck('name');

            return response()->json([
                'status' => 'success',
                'permissions' => $permissions,
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'User not authenticated.',
        ], 401);
    }

    // Test
    public function showAssignPermissionsForm(Role $role)
    {
        // $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.assign-permissions', compact('role', 'permissions'));
    }

    public function assignPermissions(Request $request, Role $role)
    {
        $permissions = $request->input('permissions', []);

        // Sync permissions with role
        $role->syncPermissions($permissions);

        return redirect()->route('roles.assignPermissionsForm', $role->id)
            ->with('success', 'Permissions assigned successfully.');
    }
}
