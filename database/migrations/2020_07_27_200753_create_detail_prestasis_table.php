<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('prestasi_id')->onDelete('cascade');
            $table->string('nama_kejuaraan', 100);
            $table->string('penyelenggara', 100);
            $table->string('tingkat', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_prestasis');
    }
}
