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
        Schema::table('balita', function (Blueprint $table) {
            $table->string('foto_kk')->nullable();
            $table->enum('status_verifikasi', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('alasan_penolakan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('balita', function (Blueprint $table) {
            $table->dropColumn(['foto_kk', 'status_verifikasi', 'alasan_penolakan']);
        });
    }
};
