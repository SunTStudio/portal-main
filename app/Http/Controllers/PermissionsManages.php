<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
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
}
