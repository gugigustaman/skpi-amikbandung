<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mahasiswa;
use App\Models\Skpi;
use App\Repositories\Repository;


class SkpiController extends Controller{
    
    private $model;

    public function __construct(Skpi $Skpi){
        $this->model = new Repository($Skpi);
    }

    public function index(Request $request)
    {
        $data['title'] = 'SKPI';
        $data['mahasiswa'] = Mahasiswa::all();
        
        return view('backend.Skpi.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->model->create($request->only($this->model->getModel()->fillable));
        return back()->with('success','SKPI Berhasil di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $this->model->update($request->only($this->model->getmodel()->fillable),$id);
        return back()->with('success','SKPI Berhasil di Update !');
    }
      public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('success','SKPI Berhasil di Hapus !');
    }    
}
