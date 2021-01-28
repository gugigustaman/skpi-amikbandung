<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Gelar;
use App\Repositories\Repository;


class GelarController extends Controller{
    
    private $model;

    public function __construct(Gelar $Gelar){
        $this->model = new Repository($Gelar);
    }

    public function index(Request $request)
    {
        $data['title'] = 'Gelar';
        $data['gelar'] = Gelar::all();
        
        return view('backend.Gelar.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->model->create($request->only($this->model->getModel()->fillable));
        return back()->with('success','Gelar Berhasil di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $this->model->update($request->only($this->model->getmodel()->fillable),$id);
        return back()->with('success','Gelar Berhasil di Update !');
    }
      public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('success','Gelar Berhasil di Hapus !');
    }    
}
