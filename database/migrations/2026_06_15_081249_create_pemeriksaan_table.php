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
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->increments('id_pemeriksaan');
            $table->unsignedInteger('Balita_id_balita');
            $table->unsignedInteger('User_id_user');
            $table->date('tanggal_periksa')->nullable();
            $table->decimal('berat_badan', 5, 2)->nullable();
            $table->decimal('tinggi_badan', 5, 2)->nullable();
            $table->decimal('lingkar_kepala', 5, 2)->nullable();
            $table->decimal('lingkar_lengan', 5, 2)->nullable();
            $table->enum('status_gizi', ['normal','stunting','gizi_buruk','obesitas'])->nullable();
            $table->text('catatan')->nullable();
            $table->foreign('Balita_id_balita')->references('id_balita')->on('balita');
            $table->foreign('User_id_user')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan');
    }
};
