<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Cek level user
    public static function cek_level()
    {
        return auth()->user()->level;
    }

    // Index list user
    public function index()
    {
        if ($this->cek_level() != 'admin') {
            return redirect(route('home'))->with('error', 'Bukan Hak Anda');
        }
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    // Hapus user
    public function hapus($id)
    {
        if ($this->cek_level() != 'admin') {
            return response()->json("Maaf ini bukan hak Anda", 200);
        } else if(auth()->user()->id == $id){
            return response()->json("Maaf ini akun Anda", 200);
        }
        User::whereId($id)->first()->delete();
        return response()->json("Berhasil menghapus akun", 200);
    }
}
