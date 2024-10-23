<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleManages extends Controller
{
    public function roles(){
        return view('access-control.roles.index');
    }

    public function rolesData(Request $request){
        $data = Role::all();
        return DataTables::of($data)->make(true);
    }
}
