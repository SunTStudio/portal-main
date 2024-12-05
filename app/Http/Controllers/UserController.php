<?php

namespace App\Http\Controllers;

use App\Models\SubWebsite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load('department');
        $subWebsitesInternal = SubWebsite::where('kategori', 'internal')->get();
        $subWebsitesExternal = SubWebsite::where('kategori', 'external')->get();

        return view('dashboard', compact('subWebsitesInternal', 'subWebsitesExternal'));
    }
    public function dashboard()
    {
        // $user = User::find($id);
        // $permissions = Permission::all();
        // $role = Role::findOrFail($id);
        // return view('roles.assign-permissions', compact('user', 'role', 'permissions'));
        // $subWebsites = SubWebsite::all();
        $subWebsitesInternal = SubWebsite::where('kategori', 'internal')->get();
        $subWebsitesExternal = SubWebsite::where('kategori', 'external')->get();
        return view('dashboard', compact('subWebsitesInternal', 'subWebsitesExternal'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function update_info_pengguna(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ]);

        $user = Auth::user();
        $user->update($validateData);
        return redirect()->back()->with('status', 'Data Pengguna Berhasil Diperbarui!');
    }

    public function new_password(Request $request)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password_lama' => 'required',
                'password_baru' => 'nullable',
            ]);

            // Get the authenticated user
            $user = Auth::user();

            // Check if the old password matches the user's current password
            if (!Hash::check($request->password_lama, $user->password)) {
                return redirect()->back()->with('status', 'Password lama tidak cocok, Periksa kembali!');
            }
            // Update the password
            if ($request->password_baru != null) {
                $validateData['password'] = Hash::make($request->password_baru);
            }
            $user->update($validateData);

            // Redirect with a success message
            return redirect()->back()->with('status', 'Data Akun Anda berhasil diperbarui!');
        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }
}
