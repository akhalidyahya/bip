<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul',50);
            $table->text('isi');
            $table->string('tanggal',25);
            $table->unsignedInteger('businesses_id');
            $table->timestamps();
        });
        Schema::table('activities', function (Blueprint $table) {
            $table->foreign('businesses_id')->references('id')->on('bisnis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
