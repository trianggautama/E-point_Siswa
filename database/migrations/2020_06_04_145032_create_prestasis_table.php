<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('siswa_id')->constrained()->onDelete('restrict');
            $table->foreignId('pedoman_id')->constrained()->onDelete('restrict');
            $table->foreignId('tahun_ajaran_id')->constrained()->onDelete('restrict');
            $table->date('tanggal_prestasi');
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
        Schema::dropIfExists('prestasis');
    }
}
