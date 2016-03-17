<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200);
            $table->integer('parent');
            $table->integer('status');
            $table->string('level',4);
            $table->text('alamat');
            $table->integer('users');
            $table->string('telp',12);
            $table->string('daerah',20);
            $table->tinyInteger('provinsi');
            $table->tinyInteger('kabupaten');
            $table->tinyInteger('kecamatan');
            $table->tinyInteger('kelurahan');
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
        Schema::drop('sekolahs');
    }
}
