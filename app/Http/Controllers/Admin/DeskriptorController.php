<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Deskriptor;
use App\Repositories\Repository;


class DeskriptorController extends Controller{
    
    private $model;

    public function __construct(Deskriptor $Deskriptor){
        $this->model = new Repository($Deskriptor);
    }

    public function index(Request $request)
    {
        $data['title'] = 'Deskriptor';
        $data['Deskriptor'] = Deskriptor::all();
        
        return view('backend.Deskriptor.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->model->create($request->only($this->model->getModel()->fillable));
        return back()->with('success','Deskriptor Berhasil di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $this->model->update($request->only($this->model->getmodel()->fillable),$id);
        return back()->with('success','Deskriptor Berhasil di Update !');
    }
      public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('success','Deskriptor Berhasil di Hapus !');
    }    
}
