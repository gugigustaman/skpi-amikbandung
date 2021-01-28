<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kelas;
use App\Repositories\Repository;


class KelasController extends Controller{
    
    private $model;

    public function __construct(Kelas $Kelas){
        $this->model = new Repository($Kelas);
    }

    public function index(Request $request)
    {
        $data['title'] = 'Kelas';
        $data['kelas'] = Kelas::all();
        
        return view('backend.Kelas.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->model->create($request->only($this->model->getModel()->fillable));
        return back()->with('success','Kelas Berhasil di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $this->model->update($request->only($this->model->getmodel()->fillable),$id);
        return back()->with('success','Kelas Berhasil di Update !');
    }
      public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('success','Kelas Berhasil di Hapus !');
    }    
}
