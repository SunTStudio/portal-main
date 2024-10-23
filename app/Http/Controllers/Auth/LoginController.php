<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            $request->session()->put('token', $token);

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'name' => 'Username atau Password tidak benar!',
        ]);
    }

    // public function loginToExternalSite(Request $request)
    // {
    //     $client = new Client();
    //     // Ambil token dari sesi di Web 1
    //     $token = session('token');
    //     // Jika Web 2 membutuhkan CSRF token
    //     // Kirim token ke Web 2
    //         $response = $client->get('http://10.14.179.250:1111/limit-sample/login-external', [
    //             'form_params' => [
    //                 'token' => $token,
    //             ],'timeout' => 30,
    //         ]);

    //         // Tangani respon dari Web 2 jika diperlukan
    //         $responseBody = $response->getBody()->getContents();
    //         return redirect()->to('http://10.14.179.250:1111/limit-sample/');
    //         // Tangani kesalahan jika terjadi
    // }

    public function logout(Request $request)
    {
        $token = session('token'); // Example token: "52|NT5IkrCHwocWWO2teFJrjvqRbzB1oupKO8HRRT1R"
        $tokenParts = explode('|', $token); // Split the token by "|"
        $tokenId = $tokenParts[0]; // Take the first part, which is "52"
        $user = Auth::user();
        $user->tokens()->where('id', $tokenId)->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
