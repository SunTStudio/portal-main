<?php

use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PermissionsManages;
use App\Http\Controllers\RoleManages;
use App\Http\Controllers\Struktur\DepartmentController;
use App\Http\Controllers\Struktur\DetailDepartmentController;
use App\Http\Controllers\Struktur\PositionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersManages;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// Rute login dan logout tanpa middleware auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Kelompokkan rute yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile-new-password', [UserController::class, 'new_password'])->name('profile.new.password');

    //User Monitoring
    Route::get('/users-monitoring', [DashboardController::class, 'usersMonitoring'])->name('users.monitoring');
    Route::get('/search-internal', [DashboardController::class, 'searchInternal'])->name('search.internal');
    Route::get('/search-external', [DashboardController::class, 'searchExternal'])->name('search.external');

    // Rute users
    Route::get('/users', [UsersManages::class, 'users'])->name('users');
    Route::get('/users/data', [UsersManages::class, 'usersData'])->name('users.data');
    Route::get('/users/create', [UsersManages::class, 'create'])->name('users.create');
    Route::post('/users/store', [UsersManages::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UsersManages::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [UsersManages::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [UsersManages::class, 'destroy'])->name('users.delete');
    Route::get('/users/detail/{id}', [UsersManages::class, 'detail'])->name('users.detail');
    Route::get('/users/roles/{id}', [UsersManages::class, 'userRoles'])->name('users.roles');
    Route::get('/users/permissions/{id}', [UsersManages::class, 'userPermissions'])->name('users.permissions');
    Route::get('/users/roles-data/{id}', [UsersManages::class, 'userRolesData'])->name('user.roles.data');
    Route::post('/users/roles-data/update/{id}', [UsersManages::class, 'updateRolesUser'])->name('user.update.roles.data');
    Route::get('/users/permissions-data/{id}', [UsersManages::class, 'userPermissionsData'])->name('user.permissions.data');
    Route::post('/users/permissions-data/update/{id}', [UsersManages::class, 'updatePermissionsUser'])->name('user.update.permissions.data');
    Route::post('/users/import', [ImportController::class, 'importUsers'])->name('users.import');
    Route::get('/users/filter-detail-dept/', [UsersManages::class, 'userFilterDetail'])->name('user.filter.index');
    Route::get('users/sort-struktur', [DashboardController::class, 'sortStruktur'])->name('sort.struktur');

    // Rute roles
    Route::get('/roles', [RoleManages::class, 'roles'])->name('roles');
    Route::get('/roles/data', [RoleManages::class, 'rolesData'])->name('roles.data');
    Route::get('/roles/create', [RoleManages::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RoleManages::class, 'store'])->name('roles.store');
    Route::get('/roles/edit/{id}', [RoleManages::class, 'edit'])->name('roles.edit');
    Route::post('/roles/update/{id}', [RoleManages::class, 'update'])->name('roles.update');
    Route::delete('/roles/delete/{id}', [RoleManages::class, 'destroy'])->name('roles.delete');
    Route::get('/roles/detail/{id}', [RoleManages::class, 'detail'])->name('roles.detail');
    Route::get('/roles/data-dont-have-permission/{role}', [RoleManages::class, 'rolesDontHavePermission'])->name('roles.data.dontHavePermissions');
    Route::get('/roles/data-has-permission/{role}', [RoleManages::class, 'rolesHasPermission'])->name('roles.data.hasPermissions');
    Route::get('/roles/insert-role-to-users/{role}', [RoleManages::class, 'insertRoleToUsers'])->name('roles.insert.roleToUsers');
    Route::post('/roles/insert-role-to-users/store/{role}', [RoleManages::class, 'storeRoleToUsers'])->name('roles.users.store');

    // Rute permissions
    Route::get('/permissions', [PermissionsManages::class, 'permissions'])->name('permissions');
    Route::get('/permissions/data', [PermissionsManages::class, 'permissionsData'])->name('permissions.data');
    Route::get('/permissions/create', [PermissionsManages::class, 'create'])->name('permissions.create');
    Route::post('/permissions/store', [PermissionsManages::class, 'store'])->name('permissions.store');
    Route::get('/permissions/edit/{id}', [PermissionsManages::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/update/{id}', [PermissionsManages::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/delete/{id}', [PermissionsManages::class, 'destroy'])->name('permissions.delete');
    Route::get('/permissions/detail/{id}', [PermissionsManages::class, 'detail'])->name('permissions.detail');
    Route::get('/permissions/data-dont-have-roles/{permission}', [PermissionsManages::class, 'permissionDontHaveRoles'])->name('permissions.data.dontHaveRoles');
    Route::get('/permissions/data-has-roles/{permission}', [PermissionsManages::class, 'permissionHasRoles'])->name('permissions.data.hasRoles');
    Route::post('permissions/import', [ImportController::class, 'importPermissions'])->name('permissions.import');

    // Rute untuk assign permissions ke roles
    Route::get('roles/{role}/assign-permissions', [RoleController::class, 'showAssignPermissionsForm'])->name('roles.assignPermissionsForm');
    Route::post('roles/{role}/assign-permissions', [RoleController::class, 'assignPermissions'])->name('roles.assignPermissions');
    Route::post('roles/import', [ImportController::class, 'importRole'])->name('roles.import');

    // Rute sub-website
    Route::get('sub-website/create', [DashboardController::class, 'create'])->name('subWebsite.create');
    Route::post('sub-website/store', [DashboardController::class, 'store'])->name('subWebsite.store');
    Route::get('sub-website/edit/{id}', [DashboardController::class, 'edit'])->name('subWebsite.edit');
    Route::post('sub-website/update/{id}', [DashboardController::class, 'update'])->name('subWebsite.update');
    Route::delete('sub-website/delete/{id}', [DashboardController::class, 'destroy'])->name('subWebsite.delete');
    Route::get('sub-website/updateData', [DashboardController::class, 'updateDataAll'])->name('subWebsite.updateDataAll');
    Route::get('sub-website/updateDataSingle/{id}', [DashboardController::class, 'updateDataSingle'])->name('subWebsite.updateDataSingle');

    // Rute sort sub website
    Route::get('sub-website/sort-access', [DashboardController::class, 'sortAccess'])->name('sort.access');
    Route::get('/download-file/{filename}', [DashboardController::class, 'download'])->name('file.download');


    //route Struktur Managemen
    //department
    Route::get('/department', [DepartmentController::class, 'index'])->name('department');
    Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::post('/department/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::delete('/department/delete/{id}', [DepartmentController::class, 'destroy'])->name('department.delete');
    Route::get('/department/data', [DepartmentController::class, 'departmentData'])->name('department.data');
    Route::post('department/import', [ImportController::class, 'importDepartment'])->name('department.import');


    //detail department
    Route::get('/department-detail', [DetailDepartmentController::class, 'index'])->name('detail.department');
    Route::get('/department-detail/create', [DetailDepartmentController::class, 'create'])->name('detail.department.create');
    Route::post('/department-detail/store', [DetailDepartmentController::class, 'store'])->name('detail.department.store');
    Route::get('/department-detail/edit/{id}', [DetailDepartmentController::class, 'edit'])->name('detail.department.edit');
    Route::post('/department-detail/update/{id}', [DetailDepartmentController::class, 'update'])->name('detail.department.update');
    Route::delete('/department-detail/delete/{id}', [DetailDepartmentController::class, 'destroy'])->name('detail.department.delete');
    Route::get('/department-detail/data', [DetailDepartmentController::class, 'detailDepartmentData'])->name('detail.department.data');
    Route::post('department-detail/import', [ImportController::class, 'importDetailDepartment'])->name('detail.department.import');

    //position
    Route::get('/position', [PositionController::class, 'index'])->name('position');
    Route::get('/position/create', [PositionController::class, 'create'])->name('position.create');
    Route::post('/position/store', [PositionController::class, 'store'])->name('position.store');
    Route::get('/position/edit/{id}', [PositionController::class, 'edit'])->name('position.edit');
    Route::post('/position/update/{id}', [PositionController::class, 'update'])->name('position.update');
    Route::delete('/position/delete/{id}', [PositionController::class, 'destroy'])->name('position.delete');
    Route::get('/position/data', [PositionController::class, 'positionData'])->name('position.data');
    Route::post('position/import', [ImportController::class, 'importPosition'])->name('position.import');

});
