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
        Schema::create('travel_packages', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('slug')->unique();
            $table->string('location');
            $table->string('destination');
            $table->json('facility')->nullable();
            $table->json(column: 'acomodation')->nullable();
            $table->string('consumption');
            $table->string('souvenir')->nullable();
            $table->string('documentation')->nullable();
            $table->string('seat_capacity');
            $table->string('bonus')->nullable();
            $table->string('duration');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->decimal('rating', 3, 2)->nullable();
            $table->timestamps();
        
            
            // Kolom tambahan untuk normalisasi TOPSIS
            $table->float('normalized_price')->nullable();
            $table->float('normalized_duration')->nullable();
            $table->float('normalized_location_score')->nullable();
        
            
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_packages');
    }
};
