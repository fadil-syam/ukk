<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class sesiController extends Controller
{
    //
    public function index()
    {
        return view('sesi.indexs');
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah pengguna sudah login
        if (auth()->check()) {
            // Jika sudah login, arahkan ke halaman dashboard
            return redirect()->intended('');
        }

        // Cek apakah email pengguna adalah admin@gmail.com
        if ($credentials['email'] === 'admin@gmail.com') {
            // Jika ya, arahkan ke halaman register
            return view('sesi.AdminRegister');
        }

        // Coba melakukan proses otentikasi
        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil, redirect ke halaman dashboard
            $request->session()->regenerate();
            return redirect()->intended('');
        }

        // Jika otentikasi gagal, kembali ke halaman login dengan pesan kesalahan
        return back()->with('loginError', 'Login failed');
    }




    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerate();

        return redirect('/login');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('sesi.profile', [
            'title' => "Profile: " . $user->name,
            'active' => "profile",
            'user' => $user, 
        ]);
    }


    public function create()
    {
        return view('sesi.register');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'alamat' => 'required',
            'password' => 'required|min:5|max:255',
            'is_admin' => 'required|boolean',
        ]);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);
        return redirect('/login')->with('success', 'registrasi admin successfull! please login');
    }
}
