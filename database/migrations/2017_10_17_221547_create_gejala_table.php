<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGejalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_gejala', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_gejala');
            $table->string('nama_gejala');
            $table->text('keterangan');
            $table->string('present_negatif');
            $table->string('present_positif');
            $table->string('absen_negatif');
            $table->string('absen_positif');
            $table->string('probabilitas');
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
       Schema::dropIfExists('master_gelaja');
    }
}
