<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('siswa_id')->constrained()->onDelete('restrict');
            $table->foreignId('pejabat_struktural_id')->constrained()->onDelete('restrict');
            $table->text('uraian');
            $table->text('saran');
            $table->date('tanggal_konseling');
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
        Schema::dropIfExists('konsultasis');
    }
}
