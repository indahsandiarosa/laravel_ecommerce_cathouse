<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    public function register_action(Request $request)
    {
        // Validasi input form
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user|min:4',  // Menyesuaikan dengan nama tabel users
            'password' => 'required|min:6', // Menambahkan aturan minimal 6 karakter untuk password
            'password_confirm' => 'required|same:password',  // Validasi konfirmasi password
        ]);

        // Menyimpan data pengguna baru
        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),  // Menyimpan password yang sudah di-hash
        ]);
        $user->save();

        // Mengembalikan response JSON agar bisa ditangani oleh AJAX
        return response()->json([
            'success' => true,
            'message' => 'Registration successful. Please login!'
        ]);
    }


    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Cek jika user adalah admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Jika bukan admin, arahkan ke halaman home
        return redirect()->route('home');
    }

    return back()->withErrors(['username' => 'Username atau password salah.']);
}

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
