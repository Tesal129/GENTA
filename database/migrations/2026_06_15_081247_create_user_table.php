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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username', 45)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('nama_kader', 45)->nullable();
            $table->enum('role', ['kader', 'admin'])->default('kader');
            $table->string('no_hp', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
