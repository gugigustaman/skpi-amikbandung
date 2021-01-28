<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikasi extends Model
{
    protected $table = 'sertifikasi';
    protected $guarded = [];

    protected $fillable = [
    	'mahasiswa_id',
    	'jenis_kegiatan_id',
    	'isi',
    	'file',
    	'status'
    ];

    protected $appends = ['desc', 'file_url'];
    
    public function Mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }

    public function JenisKegiatan() {
    	return $this->belongsTo(JenisKegiatan::class);
    }

    public function getName() {
    	$isi = json_decode($this->isi, true);
    	return implode(' ', $isi);
    }

    public function getDescAttribute() {
    	return $this->getName();
    }

    public function getStatus() {
    	switch ($this->status) {
    		case 0: return 'On Progress';
			case 1: return 'Approved';
			case 2: return 'Rejected';
			default: return 'Unknown';
    	}
    }

    public function getFileUrlAttribute() {
    	return '/file?path='.$this->file;
    }
}
