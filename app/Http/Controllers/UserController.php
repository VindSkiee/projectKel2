<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\TravelMail;


class UserController extends Controller
{
 
    // Fungsi untuk mengupdate gambar profil
    public function updateImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if (Auth::user()->profile_image) {
                Storage::delete('public/'.Auth::user()->profile_image);
            }

            // Store new image
            $path = $request->file('profile_image')->store('profile-images', 'public');
            
            Auth::user()->update([
                'profile_image' => $path
            ]);

            return back()->with('success', 'Foto profil berhasil diperbarui');
        }

        return back()->with('error', 'Gagal mengupload foto');
    }


    // Ubah Nama
    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return back()->with('success', 'Nama berhasil diperbarui.');
    }

    // Ubah Kata Sandi
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Periksa kata sandi saat ini
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Kata sandi saat ini salah.']);
        }

        // Ubah kata sandi
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Kata sandi berhasil diperbarui.');
    }

    public function showLinkRequestForm()
    {
        return view('resetPass');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Ambil email pengirim dan penerima dari form
        $userEmail = $request->input('email'); // Email pengirim yang diinputkan oleh user
        $recipientEmail = $request->input('recipient_email'); // Email penerima yang diinputkan oleh user
        
        // Mengubah pengaturan email secara dinamis sesuai dengan input pengguna
        config(['mail.username' => $userEmail]); // Mengubah username menjadi email pengirim
        config(['mail.from.address' => $userEmail]); // Mengubah pengirim menjadi email pengirim

        // Kirim email
        Mail::to($recipientEmail)->send(new TravelMail('emails.welcome'));
        // Tampilkan pesan sukses atau redirect
        return back()->with('success', 'Email berhasil dikirim!');

    }

   

    public function resetPassword(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);

        // Reset password
        $response = Password::reset($validated, function ($user) use ($request) {
            $user->forceFill([
                'password' => bcrypt($request->password)
            ])->save();
        });

        return $response == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', 'Password berhasil direset.')
            : back()->withErrors(['email' => 'Terjadi kesalahan, coba lagi nanti.']);
    }
}
