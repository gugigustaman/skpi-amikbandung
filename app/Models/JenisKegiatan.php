<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
    protected $table = 'jenis_kegiatan';
    protected $guarded = [];

    public function sertifikasi() {
    	return $this->hasMany(Sertifikasi::class, 'jenis_kegiatan_id');
    }
}
