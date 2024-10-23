<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        // Cek apakah kredensial valid
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user()->load('department','roles');
            return response()->json([
                'status' => 'success',
                'user' => $user,
                'token' => $user->createToken('API Token')->plainTextToken
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials'
        ], 401);
    }
}
