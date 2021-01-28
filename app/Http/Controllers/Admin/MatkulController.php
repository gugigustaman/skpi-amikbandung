<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Deskriptor;
use App\Models\Matkul;
use App\Models\ProgramStudi;
use App\Repositories\Repository;


class MatkulController extends Controller{
    
    private $model;

    public function __construct(Matkul $Matkul){
        $this->model = new Repository($Matkul);
    }

    public function index(Request $request)
    {
        $data['title'] = 'Matkul';
        $data['Matkul'] = Matkul::all();
        $data['program'] = ProgramStudi::all();
        $data['deskriptor'] = Deskriptor::all();
        
        return view('backend.Matkul.index', compact('data'));
    }

    public function store(Request $request)
    {
        $matkul = $this->model->create($request->only($this->model->getModel()->fillable));

        $matkul->program_studi()->sync($request->program_studi);

        return back()->with('success','Matkul Berhasil di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $this->model->update($request->only($this->model->getmodel()->fillable), $id);

        $matkul = Matkul::findOrFail($id);
        $matkul->program_studi()->sync($request->program_studi);

        return back()->with('success','Matkul Berhasil di Update !');
    }
      public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('success','Matkul Berhasil di Hapus !');
    }    
}
