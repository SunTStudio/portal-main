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
            // Cek jika pengguna sudah login di perangkat lain
            if ($user->is_logged_in) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You are already logged in on another device.'
                ], 403); // Kode status 403 untuk forbidden
            }

            // Set status is_logged_in menjadi true
            $user->is_logged_in = true;
            $user->save();

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
