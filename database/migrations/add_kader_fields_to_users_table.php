<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambah kolom jika belum ada
            if (!Schema::hasColumn('users', 'nama_kader')) {
                $table->string('nama_kader')->after('id');
            }
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->unique()->after('nama_kader');
            }
            // Jadikan email nullable karena kita pakai username
            if (Schema::hasColumn('users', 'email')) {
                $table->string('email')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nama_kader', 'username']);
        });
    }
};