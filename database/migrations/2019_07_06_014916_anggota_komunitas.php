<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnggotaKomunitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_komunitas', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('id_master_komunitas');
            $table->UnsignedInteger('id_anggota');
            $table->timestamps();

            $table->foreign('id_master_komunitas')->references('id')->on('master_komunitas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_anggota')->references('id')->on('anggota')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota_komunitas');
    }
}
