<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->string('nama_kegiatan', 100)->nullable();
            $table->date('tanggal')->nullable();
            $table->string('lokasi', 150)->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('tipe_kegiatan', ['posyandu','imunisasi','penyuluhan'])->nullable();
            $table->unsignedInteger('user_id_user');
            $table->foreign('user_id_user')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
