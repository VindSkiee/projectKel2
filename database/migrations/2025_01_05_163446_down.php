<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Update 'id' column in 'users' table
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true)->change(); // Change to BIGINT UNSIGNED AUTO_INCREMENT
        });

        // Update 'id' column in 'bookings' table
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true)->change(); // Change to BIGINT UNSIGNED AUTO_INCREMENT
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert 'id' column in 'users' table
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id')->change(); // Revert to default integer (modify as per original)
        });

        // Revert 'id' column in 'bookings' table
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->integer('id')->change(); // Revert to default integer (modify as per original)
        });
    }
};

