<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('npm');
            $table->date('ttl');
            $table->unsignedBigInteger('program_studi_id');
            $table->unsignedBigInteger('kelas_id');
            $table->string('no_ijazah');
            $table->string('thn_lulus');
            $table->unsignedBigInteger('gelar_id');
            $table->unsignedBigInteger('jenjang_pendidikan_id');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');


            $table->foreign('kelas_id')
            ->references('id')
            ->on('kelas')
            ->onDelete('cascade');

            $table->foreign('gelar_id')
            ->references('id')
            ->on('gelar')
            ->onDelete('cascade');

            $table->foreign('jenjang_pendidikan_id')
            ->references('id')
            ->on('jenjang_pendidikan')
            ->onDelete('cascade');

            $table->foreign('program_studi_id')
            ->references('id')
            ->on('program_studi')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
