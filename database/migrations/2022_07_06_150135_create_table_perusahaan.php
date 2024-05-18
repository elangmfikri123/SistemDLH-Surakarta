<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePerusahaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('nib_id')->constrained('table_nib')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('bidang_id')->constrained('table_bidang')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('pimpinan_id')->constrained('table_pimpinan')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('status_id')->constrained('status')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('kelurahan_id')->constrained('kelurahan')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('kecamatan_id')->constrained('kecamatan')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->string('email_perusahaan')->nullable();
            $table->string('telf_perusahaan')->nullable();
            $table->string('personil_ppa')->nullable();
            $table->string('personil_ipal')->nullable();
            $table->string('tikor_perusahaan')->nullable();
            $table->string('tikor_ipal')->nullable();
            $table->string('tikor_oval')->nullable();
            $table->string('tikor_pantau')->nullable();
            $table->string('filescan_perusahaan')->nullable();
            $table->string('foto_perusahaan')->nullable();
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
        Schema::dropIfExists('table_perusahaan');
    }
}
