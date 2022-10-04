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
        Schema::create('p_p_i_d_s', function (Blueprint $table) {
            $table->string('id_petugas',10)->primary();
            $table->string('nip',20);
            $table->string('nama_petugas',150);
            $table->string('jabatan',150);
            $table->string('username',60);
            $table->string('password',100);
            $table->string('foto',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_p_i_d_s');
    }
};
