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
        $table->string('no_hp_ortu', 15)->nullable()->after('nama_ayah');
    });
}

public function down(): void
{
    Schema::table('balita', function (Blueprint $table) {
        $table->dropColumn('no_hp_ortu');
    });
}
};
