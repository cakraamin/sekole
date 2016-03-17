<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLokasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasis', function (Blueprint $table) {
            $table->increments('lokasi_ID');
            $table->string('lokasi_kode',50);
            $table->string('lokasi_nama',100);
            $table->tinyInteger('lokasi_propinsi');
            $table->tinyInteger('lokasi_kabupatenkota');
            $table->tinyInteger('lokasi_kecamatan');
            $table->tinyInteger('lokasi_kelurahan');
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
        Schema::drop('lokasis');
    }
}
