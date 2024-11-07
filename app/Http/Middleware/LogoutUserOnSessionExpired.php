<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutUserOnSessionExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Ambil waktu sesi dari pengaturan Laravel
            $sessionLifetime = config('session.lifetime'); // Waktu sesi dalam menit
            $lastActivity = session()->get('last_activity_time', now());

            // Jika waktu terakhir aktif melebihi waktu sesi yang diizinkan, lakukan logout
            if (now()->diffInMinutes($lastActivity) > $sessionLifetime) {
                Auth::user()->update(['is_logged_in' => 0]);
                Auth::logout();

                // Redirect ke halaman login dengan pesan
                return redirect()->route('login')->with('message', 'Session telah kadaluarsa, silakan login kembali.');
            }

            // Perbarui waktu aktivitas terakhir
            session()->put('last_activity_time', now());
        }

        return $next($request);
    }
}
