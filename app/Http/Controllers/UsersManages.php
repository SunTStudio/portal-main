<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Detail_departement;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersManages extends Controller
{
    public function users(){
        return view('access-control.users.index');
    }

    public function usersData(Request $request){
        $data = User::all();
        return DataTables::of($data)->make(true);
    }

    public function create(Request $request){
        $departments = Department::all();
        $detail_departements =  Detail_departement::all();
        $positions = Position::all();
        return view('access-control.users.create',compact('departments','detail_departements','positions'));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'username' => 'required|string',
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

    public function detail(Request $request,$id)
    {
        $user = User::find($id);
        return view('access-control.users.detail',compact('user'));
    }

    public function edit(Request $request,$id)
    {
        $oldData  = User::find($id);
        $departments = Department::all();
        $detail_departements =  Detail_departement::all();
        $positions = Position::all();
        return view('access-control.users.edit',compact('oldData','departments','detail_departements','positions'));
    }

    public function userRoles(Request $request,$id){
        $user  = User::find($id);

        return view('access-control.users.rolePermission');
    }

    public function userPermissions(Request $request,$id){
        $user  = User::find($id);

        return view('access-control.users.rolePermission');
    }
    public function update(Request $request,$id)
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

        if($validateData['password'] == null){
            $validateData['password'] = bcrypt($oldData->password);
        }
        $oldData->update($validateData);
        return redirect()->route('users.detail',['id' => $oldData->id]);
    }

    public function destroy($id){
        $deleteUser = User::find($id);
        $deleteUser->delete();
        return redirect()->route('users');
    }
}

