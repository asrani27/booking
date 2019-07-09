<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addverifikasiditablepeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peserta', function (Blueprint $table) {
            $table->integer('verifikasi')->after('pemko_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peserta', function (Blueprint $table) {
            $table->dropColumn('verifikasi');
        });
    }
}
