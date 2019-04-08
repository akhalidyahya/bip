<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableMakeits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('makeits', function (Blueprint $table) {
            $table->string('kelamin',50)->after('nama');
            $table->string('umur',5)->after('kelamin');
            $table->string('email',50)->after('umur');
            $table->string('instagram',50)->after('no_telp');
            $table->string('facebook',50)->after('instagram');
            $table->string('twitter',50)->after('facebook');
            $table->string('instansi',50)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('makeits', function (Blueprint $table) {
            //
        });
    }
}
