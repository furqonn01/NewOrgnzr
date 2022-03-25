<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }


    public function tambah(Request $request)
    {
        if (UserController::cek_level() != 'admin') {
            return redirect(route('home'))->with('error', 'Bukan hak Anda');
        }
        $data = $request->all();
        $validator = Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        if ($validator->fails()) {
            return redirect(route('users.index'))->withErrors($validator)->withInput();
        }
        $pass = 'orgnzrpass' . random_int(0, 255) . auth()->user()->id;
        User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($pass),
            'level' => $data['level']
        ]);
        return redirect(route('users.index'))->with('success', 'Berhasil membuat akun dengan password ' . $pass);
    }
}
