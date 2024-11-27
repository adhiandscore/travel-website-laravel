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
        Schema::table('travel_packages', function (Blueprint $table) {
            $table->integer('facility')->nullable(); // Menambahkan kolom facility
            $table->integer('duration')->nullable(); // Menambahkan kolom duration
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_packages', function (Blueprint $table) {
            $table->dropColumn(['facility', 'duration']); // Menghapus kolom facility dan duration
        });
    }
};
