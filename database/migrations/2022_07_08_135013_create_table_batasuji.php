<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBatasuji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_batas_uji', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporan_id')->constrained('table_laporan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_uji');
            $table->string('batas_atas');
            $table->string('batas_bawah');
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
        Schema::dropIfExists('table_batas_uji');
    }
}
