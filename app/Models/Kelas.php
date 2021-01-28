<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $guarded = [];
    
    public function Mahasiswa(){
        return $this->hasMany('App\Models\Mahasiswa','kelas_id');
    }
}
