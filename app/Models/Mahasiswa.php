<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $guarded = [];
    
    public function Kelas()
    {
        return $this->belongsTo('App\Models\Kelas','kelas_id');
    }
    public function Gelar()
    {
        return $this->belongsTo('App\Models\Gelar','gelar_id');
    }
    public function JenjangPendidikan()
    {
        return $this->belongsTo('App\Models\JenjangPendidikan','jenjang_pendidikan_id');
    }
    public function ProgramStudi()
    {
        return $this->belongsTo('App\Models\ProgramStudi','program_studi_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function Matkul() {
        return $this->belongsToMany(Matkul::class, 'nilai_mahasiswa', 'mahasiswa_id', 'matkul_id')
            ->withPivot('kualifikasi_nilai_id');
    }

    public function KualifikasiNilai() {
        return $this->belongsToMany(KualifikasiNilai::class, 'nilai_mahasiswa', 'mahasiswa_id', 'kualifikasi_nilai_id')
            ->withPivot('matkul_id');
    }

    public function Sertifikasi() {
        return $this->hasMany(Sertifikasi::class);
    }

    public function Skpi() {
        return $this->hasOne(Skpi::class);
    }

    public function getSertifikasiStatus() {
        $status = 1;

        foreach ($this->Sertifikasi as $sertifikasi) {
            switch ($sertifikasi->status) {
                case 0: return 0;
                case 2: return 2;
            }
        }

        return $status;
    }

    public function getSertifikasiStatusDesc() {
        switch ($this->getSertifikasiStatus()) {
            case 0: return 'On Progress';
            case 1: return 'Approved';
            case 2: return 'Rejected';
            default: return 'Unknown';
        }
    }

    public function getMatkulTercapai($deskriptor_id, $kualifikasi_nilai) {
        return $this->Matkul()
            ->where('deskriptor_id', $deskriptor_id)
            ->wherePivotIn('kualifikasi_nilai_id', $kualifikasi_nilai)
            ->get();
    }

    public function getCapaianPembelajaran($deskriptor_id, $kualifikasi_nilai) {
        $cp = [];

        foreach ($this->getMatkulTercapai($deskriptor_id, $kualifikasi_nilai->pluck('id')) as $matkul) {
            $sentenceR = [];
            $sentenceR[] = $kualifikasi_nilai->firstWhere('id', $matkul->pivot->kualifikasi_nilai_id)->skala_cp;
            $sentenceR[] = $matkul->capaian_pembelajaran;

            $cp[] = ucfirst(implode(' ', $sentenceR));
        }

        return $cp;
    }
}
