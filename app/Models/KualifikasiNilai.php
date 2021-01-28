<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KualifikasiNilai extends Model
{
    protected $table = 'kualifikasi_nilai';
    protected $fillable = [
        'user_id',
        'index',
        'angka',
        'nilai_semester_from',
        'nilai_semester_to',
        'keterangan',
    ];
}
