<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Detail_departement;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UsersManages extends Controller
{
    public function users()
    {
        $departments = Department::all();
        $detail_departements = Detail_departement::all();
        $positions = Position::all();
        return view('access-control.users.index',compact('departments','detail_departements','positions'));
    }

    public function usersData(Request $request)
    {
        $data = User::with('department','detailDepartment','position')->get();
        return DataTables::of($data)->make(true);
    }

    public function create(Request $request)
    {
        $departments = Department::all();
        $detail_departements = Detail_departement::all();
        $positions = Position::all();
        return view('access-control.users.create', compact('departments', 'detail_departements', 'positions'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|string',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'tgl_masuk' => 'required',
            'dept_id' => 'required',
            'detail_dept_id' => 'required',
            'position_id' => 'required',
            'golongan' => 'required',
            'npk' => 'required|unique:users,npk',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);
        return redirect()->route('users');
    }

    public function detail(Request $request, $id)
    {
        $user = User::find($id);
        return view('access-control.users.detail', compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $oldData = User::find($id);
        $departments = Department::all();
        $detail_departements = Detail_departement::all();
        $positions = Position::all();
        return view('access-control.users.edit', compact('oldData', 'departments', 'detail_departements', 'positions'));
    }

    public function userPermissions(Request $request, $id)
    {
        $user = User::find($id);

        return view('access-control.users.userPermission', compact('user'));
    }

    public function userRoles(Request $request, $id)
    {
        $user = User::find($id);

        return view('access-control.users.userRole', compact('user'));
    }

    public function updateRolesUser(Request $request, $id)
    {
        $user = User::find($id);
        $roles = $request->input('roles');
        $user->syncRoles($roles);
        return redirect()
            ->route('users.roles', ['id' => $user->id])
            ->with('success', 'Role Users berhasil Diperbarui');
    }

    public function updatePermissionsUser(Request $request, $id)
    {
        $permissions = $request->input('permissions');
        $user = User::find($id);
        $user->syncPermissions($permissions);
        return redirect()
            ->route('users.permissions', ['id' => $user->id])
            ->with('success', 'Permissions Users berhasil Diperbarui');
    }

    public function userRolesData($id)
    {
        // Ambil user berdasarkan ID
        $user = User::findOrFail($id);

        // Ambil semua role
        $roles = Role::all();

        // Tambahkan informasi jika user memiliki role ini
        $roles = $roles->map(function ($role) use ($user) {
            $role->has_user = $user->hasRole($role->name);
            return $role;
        });

        return datatables()->of($roles)->make(true);
    }

    public function userPermissionsData($id)
    {
        // Ambil user berdasarkan ID
        $user = User::findOrFail($id);

        // Ambil semua permission
        $permissions = Permission::all();
        // Tambahkan informasi jika user memiliki permission ini

        $permissions = $permissions->map(function ($permission) use ($user) {
            $permission->has_user = $user->hasPermissionTo($permission->name);
            // Cek apakah user mendapatkan permission dari salah satu rolenya
            $fromRole = $user->roles->first(function ($role) use ($permission) {
                return $role->hasPermissionTo($permission->name);
            });

            // Jika ada role yang memberikan permission ini, simpan nama role tersebut
            $permission->status = $fromRole ? 'From Role '.$fromRole->name : '-';
            return $permission;
        });

        return datatables()->of($permissions)->make(true);
    }
    public function update(Request $request, $id)
    {
        $oldData = User::find($id);
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'username' => 'required|string',
            'password' => 'nullable',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'tgl_masuk' => 'required',
            'dept_id' => 'required',
            'detail_dept_id' => 'required',
            'position_id' => 'required',
            'golongan' => 'required',
            'npk' => 'required',
        ]);

        if ($validateData['password'] == null) {
            $validateData['password'] = bcrypt($oldData->password);
        }
        $oldData->update($validateData);
        return redirect()->route('users.detail', ['id' => $oldData->id]);
    }

    public function destroy($id)
    {
        $deleteUser = User::find($id);
        $emailDelete = $deleteUser->npk . $deleteUser->email;
        $usernameDelete = $deleteUser->npk . $deleteUser->username;
        $deleteUser->update([
            'email' => $emailDelete,
            'username' => $usernameDelete,
        ]);
        $deleteUser->delete();
        return redirect()->route('users')->with('success','User berhasil dihapus!');
    }


    public function userFilterDetail(Request $request){
        $dataDetailDept = Detail_departement::where('departement_id',$request->sortDetail)->get();
        return response()->json([
            'message' => 'success',
            'data' => $dataDetailDept,
        ]);
    }

}
