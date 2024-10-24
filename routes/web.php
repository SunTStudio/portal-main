<?php

use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionsManages;
use App\Http\Controllers\RoleManages;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersManages;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/loginToExternalSite', [LoginController::class, 'loginToExternalSite'])->name('loginToExternalSite');
Route::get('/', [UserController::class, 'index'])->middleware('auth')->name('index');
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
Route::post('/profile-new-password', [UserController::class, 'new_password'])->middleware('auth')->name('profile.new.password');
// Route::get('/dashboard', function () {/profile profile.new.password
//     return view('dashboard');
// })->middleware('auth')->name('dashboard');
//users
Route::get('/users', [UsersManages::class, 'users'])->middleware('auth')->name('users');
Route::get('/users/data', [UsersManages::class, 'usersData'])->middleware('auth')->name('users.data');
Route::get('/users/create', [UsersManages::class, 'create'])->middleware('auth')->name('users.create');
Route::post('/users/store', [UsersManages::class, 'store'])->middleware('auth')->name('users.store');
Route::get('/users/edit/{id}', [UsersManages::class, 'edit'])->middleware('auth')->name('users.edit');
Route::post('/users/update/{id}', [UsersManages::class, 'update'])->middleware('auth')->name('users.update');
Route::delete('/users/delete/{id}', [UsersManages::class, 'destroy'])->middleware('auth')->name('users.delete');
Route::get('/users/detail/{id}', [UsersManages::class, 'detail'])->middleware('auth')->name('users.detail');
Route::get('/users/roles/{id}', [UsersManages::class, 'userRoles'])->middleware('auth')->name('users.roles');
Route::get('/users/permissions/{id}', [UsersManages::class, 'userPermissions'])->middleware('auth')->name('users.permissions');


Route::get('/roles', [RoleManages::class, 'roles'])->middleware('auth')->name('roles');
Route::get('/roles/data', [RoleManages::class, 'rolesData'])->middleware('auth')->name('roles.data');
Route::get('/roles/create', [RoleManages::class, 'create'])->middleware('auth')->name('roles.create');
Route::post('/roles/store', [RoleManages::class, 'store'])->middleware('auth')->name('roles.store');
Route::get('/roles/edit/{id}', [RoleManages::class, 'edit'])->middleware('auth')->name('roles.edit');
Route::post('/roles/update/{id}', [RoleManages::class, 'update'])->middleware('auth')->name('roles.update');
Route::delete('/roles/delete/{id}', [RoleManages::class, 'destroy'])->middleware('auth')->name('roles.delete');
Route::get('/roles/detail/{id}', [RoleManages::class, 'detail'])->middleware('auth')->name('roles.detail');
Route::get('/roles/data-dont-have-permission/{role}', [RoleManages::class, 'rolesDontHavePermission'])->middleware('auth')->name('roles.data.dontHavePermissions');
Route::get('/roles/data-has-permission/{role}', [RoleManages::class, 'rolesHasPermission'])->middleware('auth')->name('roles.data.hasPermissions');

Route::get('/permissions', [PermissionsManages::class, 'permissions'])->middleware('auth')->name('permissions');
Route::get('/permissions/data', [PermissionsManages::class, 'permissionsData'])->middleware('auth')->name('permissions.data');
Route::get('/permissions/create', [PermissionsManages::class, 'create'])->middleware('auth')->name('permissions.create');
Route::post('/permissions/store', [PermissionsManages::class, 'store'])->middleware('auth')->name('permissions.store');
Route::get('/permissions/edit/{id}', [PermissionsManages::class, 'edit'])->middleware('auth')->name('permissions.edit');
Route::post('/permissions/update/{id}', [PermissionsManages::class, 'update'])->middleware('auth')->name('permissions.update');
Route::delete('/permissions/delete/{id}', [PermissionsManages::class, 'destroy'])->middleware('auth')->name('permissions.delete');
Route::get('/permissions/detail/{id}', [PermissionsManages::class, 'detail'])->middleware('auth')->name('permissions.detail');
Route::get('/permissions/data-dont-have-roles/{permission}', [PermissionsManages::class, 'permissionDontHaveRoles'])->middleware('auth')->name('permissions.data.dontHaveRoles');
Route::get('/permissions/data-has-roles/{permission}', [PermissionsManages::class, 'permissionHasRoles'])->middleware('auth')->name('permissions.data.hasRoles');

// routes/web.php
Route::get('roles/{role}/assign-permissions', [RoleController::class, 'showAssignPermissionsForm'])->name('roles.assignPermissionsForm');
Route::post('roles/{role}/assign-permissions', [RoleController::class, 'assignPermissions'])->name('roles.assignPermissions');

