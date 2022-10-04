<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_tamus', function (Blueprint $table) {
            $table->id('id');
            $table->string('nomor',10);
            $table->date('tanggal');
            $table->string('nama',150);
            $table->string('asal_instansi',100);
            $table->string('alamat',150);
            $table->string('no_tlp',15);
            $table->string('tujuan',100);
            $table->string('tingkat_kepuasan',100);
            $table->string('id_petugas',10)->nullable();
            $table->string('status',20)->nullable();
            $table->integer('verify_kunjungan')->default(0);
            $table->integer('verify_layanan')->default(0);
        });
         //relasi ke tabel tamu
         Schema::table('buku_tamus', function (Blueprint $table) {
            $table->foreign('no_tlp')->references('no_tlp')->on('tamus')->onUpdate('cascade')->onDelete('cascade');
        });
        //relasi ke tabel PPID
        Schema::table('buku_tamus', function (Blueprint $table) {
            $table->foreign('id_petugas')->references('id_petugas')->on('p_p_i_d_s')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_tamus');
    }
};
