<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('travel_packages', function (Blueprint $table) {
        $table->tinyInteger('rating')->nullable(); // Atau tipe data lain sesuai kebutuhan
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_packages', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
    }
};
