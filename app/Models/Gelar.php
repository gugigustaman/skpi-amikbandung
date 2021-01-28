<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gelar extends Model
{
    protected $table = 'gelar';
    protected $guarded = [];
    
    public function Mahasiswa(){
        return $this->hasMany('App\Models\Mahasiswa','gelar_id');
    }
}
