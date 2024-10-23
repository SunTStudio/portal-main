<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class RouteController extends Controller
{
    public function storeRoute(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:permissions,name',
        ]);

        // Spatie digunakan di sini untuk membuat permission baru
        Permission::create(['name' => $validated['name']]);

        return response()->json(['message' => 'Permission added successfully'], 201);
    }

}
