<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProgramStudi;
use App\Repositories\Repository;


class ProgramStudiController extends Controller{
    
    private $model;

    public function __construct(ProgramStudi $ProgramStudi){
        $this->model = new Repository($ProgramStudi);
    }

    public function index(Request $request)
    {
        $data['title'] = 'Program Studi';
        $data['program_studi'] = ProgramStudi::all();
        
        return view('backend.ProgramStudy.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->model->create($request->only($this->model->getModel()->fillable));
        return back()->with('success','Program Studi Berhasil di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $this->model->update($request->only($this->model->getmodel()->fillable),$id);
        return back()->with('success','Program Studi Berhasil di Update !');
    }
      public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('success','Program Studi Berhasil di Hapus !');
    }    
}
