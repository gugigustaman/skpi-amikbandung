<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProfileKampus;

class ProfileKampusController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Profile Perguruan Tinggi';
        $data['profile'] = ProfileKampus::find(1);

        return view('backend.ProfileKampus.index', compact('data'));
    }

    public function update(Request $request)
    {
        $profileKampus = ProfileKampus::updateOrCreate(
            ['id' => $request->id],
            [
                'nama' => $request->nama, 'sk_pendirian' => $request->sk_pendirian, 'alamat' => $request->alamat,
                'telepon' => $request->telepon, 'persyaratan_penerimaan' => $request->persyaratan_penerimaan,
                'email' => $request->email, 'bahasa' => $request->bahasa, 'sistem_penilaian' => $request->sistem_penilaian,
                'lama_studi' => $request->lama_studi, 'jenis_pendidikan' => $request->jenis_pendidikan, 'jenjang_kualifikasi' => $request->jenjang_kualifikasi,
                'ketua_yayasan' => $request->ketua_yayasan, 'nip_ketua_yayasan' => $request->nip_ketua_yayasan
            ],

        );

        return back()->with('success', 'Profil Perguruan Tinggi Berhasil di Simpan !');
    }
}
