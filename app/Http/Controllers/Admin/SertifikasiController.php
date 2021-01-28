<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\JenisKegiatan;
use App\Models\Mahasiswa;
use App\Models\Sertifikasi;
use App\Repositories\Repository;
use Storage;


class SertifikasiController extends Controller{
    
    private $model;

    public function __construct(Sertifikasi $Sertifikasi){
        $this->model = new Repository($Sertifikasi);
    }

    public function index(Request $request)
    {
        $data['title'] = 'Sertifikasi';

        if (Auth::user()->Mahasiswa) {
            $data['sertifikasi'] = Auth::user()->Mahasiswa->Sertifikasi;
            $data['jenis'] = JenisKegiatan::all();

            $view = 'backend.Sertifikasi.index';
        } else {
            $data['mahasiswa'] = Mahasiswa::has('Sertifikasi')->get();
            $data['jenis'] = JenisKegiatan::all();

            $view = 'backend.Sertifikasi.admin-index';
        }
        
        return view($view, compact('data'));
    }

    public function store(Request $request)
    {        
        $data = $request->only($this->model->getModel()->fillable);

        $data['isi'] = json_encode($data['atribut']);

        if ($request->file) {
            $filename = date('YmdHisu').'.jpg';
            $path = $request->file('file')->store('sertifikat');

            $data['file'] = $path;
        }

        $cert = $this->model->create($data);

        return back()->with('success','Sertifikasi Berhasil di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $data = $request->only($this->model->getmodel()->fillable);

        $data['isi'] = json_encode($data['atribut']);

        if ($request->file) {
            $filename = date('YmdHisu').'.jpg';
            $path = $request->file('file')->store('sertifikat');

            $data['file'] = $path;
        }

        $this->model->update($data, $id);

        return back()->with('success','Sertifikasi Berhasil di Update !');
    }
      public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('success','Sertifikasi Berhasil di Hapus !');
    }
}
