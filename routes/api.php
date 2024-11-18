<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = Auth::user()->load('department','roles')->makeVisible('password');
    return response()->json([
        'status' => 'success',
        'user' => $user
    ]);
});

// Route::post('/login', [AuthController::class, 'login']);
// Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);
// Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RouteController;
use App\Http\Controllers\PermissionController;

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->get('/verif-token', function (Request $request) {
    return response()->json([
        'status' => 'Success',
        'user' => $request->user()
    ]);
});

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response()->json([
        'status' => 'Success',
        'message' => 'Successfully Logout'
    ]);
});

// Rute untuk mengambil data role
Route::get('/roles', [RoleController::class, 'index']);
Route::get('/user-role', [RoleController::class, 'getUserRole']);
Route::middleware('auth:sanctum')->get('/users/{id}/roles', [RoleController::class, 'getUserRoles']);

Route::post('/store-route', [RouteController::class, 'storeRoute']);
// routes/api.php
// Route::get('permissions', [PermissionController::class, 'index']);
// routes/api.php
Route::middleware('auth:sanctum')->get('/user-permissions', [RoleController::class, 'getUserPermissions']);

Route::get('/users', [App\Http\Controllers\API\UserController::class, 'index']);
Route::get('/handleError', [App\Http\Controllers\API\UserController::class, 'handleError']);

// Route::post('/form-submit', function (Request $request) {
//     // Dump and Die untuk melihat data yang diterima
//      // Validasi data
//      $validated = $request->validate([
//         'field1' => 'required|string',
//         'field2' => 'required|string',
//         // tambahkan validasi untuk field lainnya sesuai kebutuhan
//     ]);

//     // Menyimpan data ke database
//     // FormSubmission::create([
//     //     'field1' => $validated['field1'],
//     //     'field2' => $validated['field2'],
//     //     // sesuaikan dengan field lainnya
//     // ]);

//     // Mengirimkan respon sukses
//     return response()->json(['message' => 'Data berhasil disimpan'], 200);
// });
