<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggarans', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('pedoman_id')->constrained()->onDelete('cascade');
            $table->foreignId('tahun_ajaran_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_pelanggaran');
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
        Schema::dropIfExists('pelanggarans');
    }
}
