<?php

namespace App\Http\Controllers;

use App\Models\Sertif;
use Illuminate\Http\Request;

class SertifController extends Controller
{
    // Index
    public function index()
    {
        $sertifs = Sertif::whereKodeUser(auth()->user()->id)->paginate();
        foreach ($sertifs as $key => $value) {
            $value['no'] = $key + 1;
        }
        return view('sertifikat.index', compact('sertifs'));
    }

    // Post
    public function post(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $fileName = 'sertifikat_' . str_replace(' ', '_', $request->nama) . '_' . auth()->user()->id . '_' . time() . '.' . $ext;
            $destinationPath = public_path() . '/sertif/' . auth()->user()->id . '/';
            $file->move($destinationPath, $fileName);
        } else {
            return redirect(route('sertifs.index'))->with('error', 'Tidak ada file yang diunggah');
        }
        $data = new Sertif();
        $data->nama = $request->nama;
        $data->nama_file = $fileName;
        $data->kode_user = auth()->user()->id;
        $data->ket = $request->ket;
        $data->save();
        return redirect(route('sertifs.index'))->with('success', 'Berhasil mengupload file');
    }

    // Hapus
    public function hapus($id)
    {
        $sertif = Sertif::find($id);
        if (auth()->user()->id != $sertif->kode_user) {
            return response()->json("Maaf ini bukan sertifikat Anda", 200);
        }
        $sertif->delete();
        return response()->json("Berhasil menghapus sertifikat");
    }
}
