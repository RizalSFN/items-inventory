<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Profil';
        $data = User::findOrFail(auth()->user()->id);
        return view('content.profil', compact('title', 'data'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|email',
                'telepon' => 'required|numeric',
                'alamat' => 'required',
                'password' => 'nullable|regex:/[0-9]/|confirmed',
                'password_confirmation' => 'nullable|regex:/[0-9]/'
            ],
            [
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
                'password.regex' => 'Password harus mengandung angka'
            ]
        );

        if ($request->password) {
            User::findOrFail(auth()->user()->id)->update([
                'name' => $request->nama,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat
            ]);
        } else {
            User::findOrFail(auth()->user()->id)->update([
                'name' => $request->nama,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->back()->with('success', 'Profil berhasil diubah');
    }
}
