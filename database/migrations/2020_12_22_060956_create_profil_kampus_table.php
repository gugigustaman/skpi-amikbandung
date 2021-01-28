<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilKampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_kampus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('sk_pendirian');
            $table->text('alamat');
            $table->string('telepon', 20);
            $table->string('persyaratan_penerimaan');
            $table->string('email');
            $table->string('bahasa');
            $table->string('sistem_penilaian');
            $table->string('lama_studi');
            $table->string('jenis_pendidikan');
            $table->string('jenjang_kualifikasi');
            $table->string('ketua_yayasan');
            $table->string('nip_ketua_yayasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_kampus');
    }
}
