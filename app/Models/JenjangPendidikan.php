<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenjangPendidikan extends Model
{
    protected $table = 'jenjang_pendidikan';
    protected $guarded = [];
    
    public function Mahasiswa(){
        return $this->hasMany('App\Models\Mahasiswa','jenjang_pendidikan_id');
    }
}
