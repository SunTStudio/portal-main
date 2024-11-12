<?php

namespace App\Http\Controllers;

use App\Models\SubWebsite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function index()
    {
        $user = Auth::user()->load('department');
        $subWebsites = SubWebsite::all();

        return view('dashboard',compact('subWebsites'));
    }
    public function dashboard()
    {
        // $user = User::find($id);
        // $permissions = Permission::all();
        // $role = Role::findOrFail($id);
        // return view('roles.assign-permissions', compact('user', 'role', 'permissions'));
        $subWebsites = SubWebsite::all();
        return view('dashboard',compact('subWebsites'));
    }

    public function profile(){
        return view('profile');
    }

    public function new_password(Request $request){
        $validateData = $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
        ]);

        // Get the authenticated user
    $user = Auth::user();

    // Check if the old password matches the user's current password
    if (!Hash::check($request->password_lama, $user->password)) {
        return redirect()->back()->with('status', 'Password lama tidak cocok, Periksa kembali!');
    }
    // Update the password
    $user->password = Hash::make($request->password_baru);
    $user->save();

    // Redirect with a success message
    return redirect()->back()->with('status', 'Password berhasil diperbarui!');

    }
}
