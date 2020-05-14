<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePejabatStrukturalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pejabat_strukturals', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->string('NIP', 25);
            $table->string('nama', 50);
            $table->string('jabatan', 30);
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
        Schema::dropIfExists('pejabat_strukturals');
    }
}
