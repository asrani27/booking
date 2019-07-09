<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MasterKomunitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_komunitas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_komunitas');
            $table->string('deskripsi')->nullable();
            $table->UnsignedInteger('anggota_id')->nullable();
            $table->timestamps();

            $table->foreign('anggota_id')->references('id')->on('anggota')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_komunitas');
    }
}
