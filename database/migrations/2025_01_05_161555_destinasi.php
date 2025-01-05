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
        Schema::create('destinasiWisata', function (Blueprint $table) {
            $table->id(); // Primary key, AUTO_INCREMENT
            $table->string('jarak', 255);
            $table->string('tujuan', 255);
            $table->string('image', 255);
            $table->string('namawisata', 255)->nullable();
            $table->string('harga', 255);
            $table->string('deskripsiWisata', 255)->nullable();
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinasiWisata');
    }
};
