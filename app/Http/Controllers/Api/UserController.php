<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Detail_departement;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $users->load('position','department','detailDepartment','roles');
        $positions = Position::all();
        $departments = Department::all();
        $detailDept = Detail_departement::all();
        // $detailDept->load('department');

        return response()->json(
            [
                'status' => 'success',
                'users' => $users,
                'positions' => $positions,
                'departments' => $departments,
                'detailDept' => $detailDept,
            ],
            200,
        );
    }

    public function handleError(Request $request){
        dd([
            'error_message' => $request['error_message'],
            'error_code' => $request['error_code']
        ]);
    }
}
