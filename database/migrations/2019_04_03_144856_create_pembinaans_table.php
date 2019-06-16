<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembinaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembinaans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nama');
            $table->string('kelamin');
            $table->string('umur');
            $table->string('angkatan');
            $table->string('jurusan');
            $table->string('kelas');
            $table->string('no_telp');
            $table->string('email');
            $table->string('instansi');
            $table->string('status');
            $table->string('kelompok')->nullable();
            $table->string('pic')->nullable();
            $table->string('interest')->nullable();
            $table->string('tindakan')->nullable();
            $table->string('murabbi')->nullable();
            $table->string('liqo')->nullable();
            $table->string('bisnis')->nullable();
            $table->string('pemahaman')->nullable();
            $table->string('keterlibatan')->nullable();
            $table->string('penugasan')->nullable();
            $table->string('proyeksi')->nullable();
            $table->string('kolam')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembinaans');
    }
}
