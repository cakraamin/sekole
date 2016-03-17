<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegristrasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regristrasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('hp',14);
            $table->string('email');
            $table->integer('sekolah_id');
            $table->tinyInteger('status');
            $table->string('registrasi_key',200);
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
        Schema::drop('regristrasis');
    }
}
