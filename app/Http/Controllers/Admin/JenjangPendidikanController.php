<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\JenjangPendidikan;
use App\Repositories\Repository;


class JenjangPendidikanController extends Controller{
    
    private $model;

    public function __construct(JenjangPendidikan $JenjangPendidikan){
        $this->model = new Repository($JenjangPendidikan);
    }

    public function index(Request $request)
    {
        $data['title'] = 'Jenjang Pendidikan';
        $data['jenjang'] = JenjangPendidikan::all();
        
        return view('backend.JenjangPendidikan.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->model->create($request->only($this->model->getModel()->fillable));
        return back()->with('success','Jenjang Pendidikan Berhasil di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $this->model->update($request->only($this->model->getmodel()->fillable),$id);
        return back()->with('success','Jenjang Pendidikan Berhasil di Update !');
    }
      public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('success','Jenjang Pendidikan Berhasil di Hapus !');
    }    
}
