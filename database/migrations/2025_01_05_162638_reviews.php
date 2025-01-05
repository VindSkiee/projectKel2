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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id')->index(); // Ensure unsignedBigInteger
            $table->unsignedBigInteger('pemesanan_id')->index(); // Ensure unsignedBigInteger
            $table->integer('rating')->nullable();
            $table->text('review_text')->nullable();
            $table->timestamps(); // Automatically handles created_at and updated_at

            // Add foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pemesanan_id')->references('id')->on('bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
