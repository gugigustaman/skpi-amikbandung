<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skpi extends Model
{
    protected $table = 'skpi';
    protected $guarded = [];
    
    public function Mahasiswa(){
        return $this->belongsTo(Mahasiswa::class,'mahasiswa_id');
    }

    public static function generateNewNoSkpi(ProgramStudi $prodi, JenjangPendidikan $jenjang) {
    	$last = self::whereHas('Mahasiswa', function ($q) use ($prodi) {
    		$q->where('program_studi_id', $prodi->id);
    	})->orderBy('id', 'desc')
    		->whereYear('created_at', date('Y'))
    		->count();

    	return 'SKPI/' . $jenjang->code . $prodi->code . '/' . date('Y') . '/' . $prodi->code . str_pad($last + 1, 4, '0', STR_PAD_LEFT);
    }
}
