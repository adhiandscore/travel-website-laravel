<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPreferencesToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('level')->nullable();
            $table->string('location')->nullable();
            $table->string('type')->nullable();
            $table->decimal('max_price', 8, 2)->nullable();
            $table->integer('min_duration')->nullable();
        });
    }

    // Reverse migration

    // @return void

    public function down(){

        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('level');
            $table->dropColumn('location');
            $table->dropColumn('type');
            $table->dropColumn('max_price');
            $table->dropColumn('min_duration');
        });
    }
}

