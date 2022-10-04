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
        Schema::create('k_s_p_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('nip',20);
            $table->string('nama_kabag',150);
            $table->string('jabatan',150);
            $table->string('username',60)->unique();
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
        Schema::dropIfExists('k_s_p_p_s');
    }
};
