<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Halaman Register
    public function showRegisterForm()
    {
        return view('register');
    }

    // Proses Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    // Halaman Login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user(); // Ambil data user yang login
            session(['user_id' => $user->id]); // Simpan user_id ke session
        
            // Periksa role user
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Redirect ke dashboard admin
            }
        
            return redirect()->route('home'); // Redirect ke dashboard user
        } else{
            return back()->withErrors(['email' => 'Email or password is wrong.'])->withInput();
        }
    }
            
            

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }

    public function profile()
    {
        $user = Auth::user(); // Data user yang sedang login
        return view('profile', compact('user'));
    }

    
}