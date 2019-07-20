<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePembinaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembinaans', function (Blueprint $table) {
            $table->string('nama')->nullable()->change();
            $table->string('kelamin')->nullable()->change();
            $table->string('umur')->nullable()->change();
            $table->string('angkatan')->nullable()->change();
            $table->string('jurusan')->nullable()->change();
            $table->string('kelas')->nullable()->change();
            $table->string('no_telp')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('instansi')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('kolam')->nullable()->change();
            $table->string('businesses_id')->nullable()->after('kolam');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembinaans', function (Blueprint $table) {
            //
        });
    }
}
