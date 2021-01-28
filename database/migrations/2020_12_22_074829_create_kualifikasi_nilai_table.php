<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKualifikasiNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kualifikasi_nilai', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('index');
            $table->float('angka');
            $table->tinyInteger('nilai_semester_from');
            $table->tinyInteger('nilai_semester_to');
            $table->text('keterangan');
            $table->string('skala_cp');
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
        Schema::dropIfExists('kualifikasi_nilai');
    }
}
