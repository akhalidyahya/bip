<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',50);
            $table->string('kelamin',20);
            $table->string('umur',2);
            $table->string('angkatan',4);
            $table->string('jurusan',20);
            $table->string('kelas',10);
            $table->string('no_telp',15);
            $table->string('email');
            $table->string('instansi');
            $table->string('level')->default(1); 
            $table->string('kelompok')->nullable();
            $table->string('pic')->nullable();
            $table->string('interest')->nullable();
            $table->string('tindakan')->nullable();
            $table->string('guru')->nullable();
            $table->string('pertemuan')->nullable();
            $table->string('pemahaman')->nullable();
            $table->string('keterlibatan')->nullable();
            $table->string('penugasan')->nullable();
            $table->string('proyeksi')->nullable();
            $table->string('tags')->nullable(); //contoh: 'bip','makeit','kopikir'
            $table->string('input_by',20)->nullable(); //option: 'admin bip','admin super'
            $table->unsignedInteger('event_id')->nullable(); //nyambung ke tabel event
            $table->unsignedInteger('business_id')->nullable(); //nyambung ke tabel business
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
        Schema::dropIfExists('members');
    }
}
