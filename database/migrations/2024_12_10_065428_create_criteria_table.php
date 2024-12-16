<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name')->unique()->comment('Nama kriteria, contoh: Harga, Lokasi');
            $table->decimal('weight', 5, 4)->comment('Bobot kriteria, contoh: 0.3000');
            $table->boolean('is_benefit')->comment('Apakah kriteria bersifat benefit (true) atau cost (false)');
            $table->timestamps(); // Timestamps (created_at dan updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criteria');
    }
}
