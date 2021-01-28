<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KualifikasiNilai;
use App\Repositories\Repository;
use App\Http\Controllers\Controller;
use App\Http\Requests\KualifikasiNilaiRequest;

class KualifikasiNilaiController extends Controller
{
    private $model;

    public function __construct(KualifikasiNilai $kualifikasiNilai)
    {
        $this->model = new Repository($kualifikasiNilai);
    }

    public function index(Request $request)
    {
        $data['title'] = 'Kualifikasi Nilai';
        $data['data'] = $this->model->all();

        return view('backend.kualifikasi-nilai.index', compact('data'));
    }

    public function store(KualifikasiNilaiRequest $request)
    {
        $this->model->create($request->form());
        return back()->with('success', 'Kualifikasi Nilai Berhasil di Simpan !');
    }

    public function update(KualifikasiNilaiRequest $request, $id)
    {
        $this->model->update($request->form(), $id);
        return back()->with('success', 'Kualifikasi Nilai Berhasil di Update !');
    }
    public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('success', 'Kualifikasi Nilai Berhasil di Hapus !');
    }
}
