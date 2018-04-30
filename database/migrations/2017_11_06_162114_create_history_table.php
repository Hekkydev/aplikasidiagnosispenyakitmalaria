<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_diagnosa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_user');
            $table->string('kode_penyakit');
            $table->string('kode_solusi');
            $table->string('kode_penyebab');
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
       Schema::dropIfExists('history_diagnosa');
    }
}
