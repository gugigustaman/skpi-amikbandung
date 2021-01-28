<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $table = 'matkul';
    protected $guarded = [];

    protected $fillable = [
    	'mata_kuliah',
    	'deskriptor_id',
    	'capaian_pembelajaran'
    ];

    public function deskriptor() {
    	return $this->belongsTo(Deskriptor::class);
    }

	public function program_studi() {
		return $this->belongsToMany(ProgramStudi::class, 'program_studi_matkul', 'matkul_id', 'program_studi_id');
	}
}
