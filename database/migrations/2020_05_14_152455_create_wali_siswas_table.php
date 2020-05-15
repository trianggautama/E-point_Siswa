<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali_siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->string('nama', 50);
            $table->string('no_hp', 25);
            $table->string('alamat', 50);
            $table->tinyInteger('status_wali');
            $table->timestamps();
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wali_siswas');
    }
}
