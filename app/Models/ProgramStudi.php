<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';
    protected $guarded = [];
    
    public function Mahasiswa(){
        return $this->hasMany('App\Models\Mahasiswa','program_studi_id');
    }

    public function Matkul() {
    	return $this->belongsToMany(Matkul::class, 'program_studi_matkul', 'program_studi_id', 'matkul_id');
    }
}
