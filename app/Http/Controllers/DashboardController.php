<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Detail_departement;
use App\Models\Position;
use App\Models\SubWebsite;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function create(Request $request)
    {
        // $cek = SubWebsite::find(1);
        // $positions = json_decode($cek->positions);
        // dd(in_array('Staff',$positions));
        $departments = Department::all();
        $detail_departements = Detail_departement::all();
        $positions = Position::all();
        $users = User::all();
        return view('subWebsite.create', compact('users', 'departments', 'detail_departements', 'positions'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'sampul' => 'required',
            'link' => 'required',
        ]);
        //move sampul image to public img/subWebsite
        $sampul = $request->file('sampul');
        $sampulName = time() . '.' . $sampul->getClientOriginalExtension();
        $sampul->move(public_path('img/subWebsite'), $sampulName);

        //convert Array selected to json to input database
        $departments = $request->input('departments');
        $detail_departements = $request->input('detail_departements');
        $positions = $request->input('positions');
        $users = $request->input('users');

        if ($users != null && $users != 'tidak') {
            $role = Str::slug($validateData['name']);
            Role::create(['name' => $role]);
            $validateData['role'] = $role;
            foreach ($users as $user) {
                $addRoleToUser = User::where('npk', $user)->first();
                $addRoleToUser->assignRole($role);
            }
        }

        if ($departments == null) {
            $departments = ['semua'];
        }

        if ($detail_departements == null) {
            $detail_departements = ['semua'];
        }

        if ($positions == null) {
            $positions = ['semua'];
        }

        if ($users == null) {
            $users = ['semua'];
        }

        $validateData['departments'] = json_encode($departments);
        $validateData['detail_departements'] = json_encode($detail_departements);
        $validateData['positions'] = json_encode($positions);
        $validateData['users'] = json_encode($users);
        $validateData['sampul'] = $sampulName;

        SubWebsite::create($validateData);

        return redirect()->route('dashboard')->with('success', 'Sub Website berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $oldData = SubWebsite::find($id);
        $departments = Department::all();
        $queryUsers = User::query();

        if (!in_array('semua', json_decode($oldData->departments)) && !in_array('tidak', json_decode($oldData->departments))) {
            $department = [];
            foreach (json_decode($oldData->departments) as $department) {
                $departmentId = Department::where('name', $department)->first();
                $departments_list[] = $departmentId->id;
            }
            $detail_departements = Detail_departement::whereIn('departement_id', $departments_list)->get();
        } else {
            $detail_departements = Detail_departement::all();
        }

        if (!in_array('semua', json_decode($oldData->departments)) && !in_array('tidak', json_decode($oldData->departments))) {
            foreach (json_decode($oldData->departments) as $department) {
                $departmentId = Department::where('name', $department)->first();
                $departments_list[] = $departmentId->id;
            }
            $queryUsers->whereIn('dept_id', $departments_list);
        }

        if (!in_array('semua', json_decode($oldData->detail_departements)) && !in_array('semua', json_decode($oldData->detail_departements))) {
            foreach (json_decode($oldData->detail_departements) as $detail_departement) {
                $detail_departementId = Detail_departement::where('name', $detail_departement)->first();
                $detail_departement_list[] = $detail_departementId->id;
            }
            $queryUsers->whereIn('detail_dept_id', $detail_departement_list);
        }

        if (!in_array('semua', json_decode($oldData->positions)) && !in_array('semua', json_decode($oldData->positions))) {
            foreach (json_decode($oldData->positions) as $position) {
                $positionId = Position::where('position', $position)->first();
                $positions_list[] = $positionId->id;
            }
            $queryUsers->whereIn('position_id', $positions_list);
        }

        $users = $queryUsers->get();
        $positions = Position::all();
        return view('subWebsite.edit', compact('users', 'oldData', 'departments', 'detail_departements', 'positions'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $oldData = SubWebsite::find($id);

        if ($request->sampul == null) {
            $sampulName = $oldData->sampul;
        } else {
            //move sampul image to public img/subWebsite
            $sampul = $request->file('sampul');
            $sampulName = time() . '.' . $sampul->getClientOriginalExtension();
            $sampul->move(public_path('img/subWebsite'), $sampulName);

            //hapus foto sampul lama
            $oldSampulPath = public_path('img/subWebsite/' . $oldData->sampul);
            if (file_exists($oldSampulPath)) {
                unlink($oldSampulPath); // Menghapus file foto lama
            }
        }

        //convert Array selected to json to input database
        $departments = $request->input('departments');
        $detail_departements = $request->input('detail_departements');
        $positions = $request->input('positions');
        $users = $request->input('users');

        if ($users == null) {
            $users = ['semua'];
        }

        if (!in_array('semua', $users) && !in_array('tidak', $users)) {
            $role = Str::slug($validateData['name']);
            if ($oldData->role == null) {
                Role::create(['name' => $role]);
                $validateData['role'] = $role;
            } else {
                $validateData['role'] = $oldData->role;
            }
            foreach ($users as $user) {
                $addRoleToUser = User::where('npk', $user)->first();
                if (!$addRoleToUser->roles->contains($oldData->role)) {
                    $addRoleToUser->assignRole($role);
                }
            }
        } else {
            if ($oldData->role != null) {
                $deleteRole = Role::findByName($oldData->role);
                $deleteRole->delete();
                $validateData['role'] = null;
            }
        }

        if ($departments == null) {
            $departments = ['semua'];
        }

        if ($detail_departements == null) {
            $detail_departements = ['semua'];
        }

        if ($positions == null) {
            $positions = ['semua'];
        }

        $validateData['departments'] = json_encode($departments);
        $validateData['detail_departements'] = json_encode($detail_departements);
        $validateData['positions'] = json_encode($positions);
        $validateData['users'] = json_encode($users);
        $validateData['sampul'] = $sampulName;

        $oldData->update($validateData);
        return redirect()->route('dashboard')->with('success', 'Sub Website berhasil di update!');
    }

    public function destroy($id)
    {
        $deleteData = SubWebsite::find($id);
        $deleteData->delete();
        return redirect()->route('dashboard')->with('success', 'Sub Website berhasil di Hapus!');
    }

    public function updateDataAll()
    {
        $subWebsites = SubWebsite::all();
        $UserData = User::withTrashed()->with('roles')->get();
        $DeptData = Department::all();
        $DetailDeptData = Detail_departement::all();
        $PositionData = Position::all();
        $allRole = Role::with('permissions')->get();
        $allPermission = Permission::all();
        // foreach($subWebsites as $subWebsite){
        $client = new Client();
        // Menyiapkan data yang akan dikirimkan
        $data = [
            'users' => $UserData->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'npk' => $user->npk,
                    'username' => $user->username,
                    'gender' => $user->gender,
                    'tgl_masuk' => $user->tgl_masuk,
                    'tgl_lahir' => $user->tgl_lahir,
                    'dept_id' => $user->dept_id,
                    'position_id' => $user->position_id,
                    'detail_dept_id' => $user->detail_dept_id,
                    'golongan' => $user->golongan,
                    'email_verified_at' => $user->email_verified_at,
                    'deleted_at' => $user->deleted_at,
                    'password' => $user->password, // Pastikan password sudah terenkripsi dengan bcrypt saat update
                    'role' => $user->roles->pluck('name'), // Asumsikan role diambil dari relasi roles
                    'permissions' => $user->permissions->pluck('name'), // Asumsikan permissions diambil dari relasi permissions
                ];
            }),
            'departments' => $DeptData,
            'detail_departments' => $DetailDeptData,
            'positions' => $PositionData,
            'allRole' => $allRole,
            'allPermission' => $allPermission,
        ];
        try {
            foreach ($subWebsites as $subWebsite) {
                // Mengirimkan request POST
                $response = $client->post($subWebsite->link . '/api/updateDataAPI', [
                    // $response = $client->post('http://10.14.179.250:3333/api/updateDataAPI', [
                    'json' => $data, // Menggunakan 'json' untuk otomatis mengatur Content-Type ke application/json
                ]);
            }

            $data = json_decode($response->getBody()->getContents(), true);
            return redirect()->route('dashboard')->with($data);
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    public function updateDataSingle($id)
    {
        $url = SubWebsite::find($id);
        $UserData = User::withTrashed()->with('roles')->get();
        $DeptData = Department::all();
        $DetailDeptData = Detail_departement::all();
        $PositionData = Position::all();
        $allRole = Role::with('permissions')->get();
        $allPermission = Permission::all();
        // foreach($subWebsites as $subWebsite){
        $client = new Client();
        // Menyiapkan data yang akan dikirimkan
        $data = [
            'users' => $UserData->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'npk' => $user->npk,
                    'username' => $user->username,
                    'gender' => $user->gender,
                    'tgl_masuk' => $user->tgl_masuk,
                    'tgl_lahir' => $user->tgl_lahir,
                    'dept_id' => $user->dept_id,
                    'position_id' => $user->position_id,
                    'detail_dept_id' => $user->detail_dept_id,
                    'golongan' => $user->golongan,
                    'email_verified_at' => $user->email_verified_at,
                    'deleted_at' => $user->deleted_at,
                    'password' => $user->password, // Pastikan password sudah terenkripsi dengan bcrypt saat update
                    'role' => $user->roles->pluck('name'), // Asumsikan role diambil dari relasi roles
                    'permissions' => $user->permissions->pluck('name'), // Asumsikan permissions diambil dari relasi permissions
                ];
            }),
            'departments' => $DeptData,
            'detail_departments' => $DetailDeptData,
            'positions' => $PositionData,
            'allRole' => $allRole,
            'allPermission' => $allPermission,
        ];
        try {
                // Mengirimkan request POST
                $response = $client->post($url->link . '/api/updateDataAPI', [
                    // $response = $client->post('http://10.14.179.250:3333/api/updateDataAPI', [
                    'json' => $data, // Menggunakan 'json' untuk otomatis mengatur Content-Type ke application/json
                ]);

            $data = json_decode($response->getBody()->getContents(), true);
            return redirect()->route('dashboard')->with($data);
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    public function sortAccess(Request $request)
    {
        $sortDepartments = $request->sortDepartment;
        $sortDetailDepartments = $request->sortDetailDepartment;
        $sortPositions = $request->sortPosition;

        $queryUsers = User::query();
        $queryDetailDepartments = Detail_departement::query();

        if ($sortDepartments != null) {
            $Department = [];
            foreach ($sortDepartments as $sortDepartment) {
                $DepartmentId = Department::where('name', $sortDepartment)->first();
                $Department[] = $DepartmentId->id;
            }

            $queryUsers->whereIn('dept_id', $Department);
            $queryDetailDepartments->whereIn('departement_id', $Department);
        }

        if ($sortDetailDepartments != null) {
            $DetailDepartments = [];
            foreach ($sortDetailDepartments as $sortDetailDepartment) {
                $DetailDepartmentId = Detail_departement::where('name', $sortDetailDepartment)->first();
                $DetailDepartments[] = $DetailDepartmentId->id;
            }

            $queryUsers->whereIn('detail_dept_id', $DetailDepartments);
        }

        if ($sortPositions != null) {
            $Positions = [];
            foreach ($sortPositions as $sortPosition) {
                $PositionId = Position::where('position', $sortPosition)->first();
                $Positions[] = $PositionId->id;
            }

            $queryUsers->whereIn('position_id', $Positions);
        }

        // Eksekusi queryUsers untuk mendapatkan hasil
        $resultUsers = $queryUsers->get();
        $resultDetailDepartments = $queryDetailDepartments->get();

        return response()->json([
            'message' => 'Success',
            'resultUsers' => $resultUsers,
            'resultDetailDepartments' => $resultDetailDepartments,
        ]);
    }

    public function sortStruktur(Request $request)
    {
        $sortDepartments = $request->sortDepartment;
        // Eksekusi queryUsers untuk mendapatkan hasil
        if (in_array(null, $sortDepartments)) {
            $resultDetailDepartments = Detail_departement::all();
        } else {
            $resultDetailDepartments = Detail_departement::whereIn('departement_id', $sortDepartments)->get();
        }

        return response()->json([
            'message' => 'Success',
            'resultDetailDepartments' => $resultDetailDepartments,
        ]);
    }

    public function download($filename)
    {
        // Tentukan path file, sesuaikan dengan lokasi file Anda
        $filePath = public_path('template/' . $filename);

        // Periksa apakah file ada
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return abort(404, 'File not found.');
    }
}
