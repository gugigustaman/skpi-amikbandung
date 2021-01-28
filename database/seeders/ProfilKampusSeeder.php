<?php

namespace Database\Seeders;

use App\Models\ProfileKampus;
use Illuminate\Database\Seeder;

class ProfilKampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfileKampus::truncate();
        ProfileKampus::create([
            'nama' => 'Test',
            'sk_pendirian' => 'Test',
            'alamat' => 'Test',
            'telepon' => 'Test',
            'persyaratan_penerimaan' => 'Test',
            'email' => 'Test',
            'bahasa' => 'Test',
            'sistem_penilaian' => 'Test',
            'lama_studi' => 'Test',
            'jenis_pendidikan' => 'Test',
            'jenjang_kualifikasi' => 'Test',
            'ketua_yayasan' => 'Test',
            'nip_ketua_yayasan' => 'Test',
        ]);
    }
}
