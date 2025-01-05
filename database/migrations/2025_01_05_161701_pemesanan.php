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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id(); // Primary key, AUTO_INCREMENT
            $table->unsignedBigInteger('user_id')->index(); // Foreign key to users table
            $table->string('nama_lengkap', 255);
            $table->string('nomor_hp', 255);
            $table->unsignedBigInteger('destinasi_id')->index(); // Foreign key to destinations table
            $table->enum('jenis_kendaraan', ['Bus', 'Mini Bus']);
            $table->string('kursi_dipilih', 255)->nullable();
            $table->date('tanggal');
            $table->enum('jam', ['09:00', '12:00', '15:00', '17:00']);
            $table->enum('metode_pembayaran', ['transfer', 'ewallet', 'qris', 'cash']);
            $table->decimal('total_pembayaran', 10, 2);
            $table->enum('status_pembayaran', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->unsignedBigInteger('voucher_id')->nullable()->index(); // Foreign key to vouchers table
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
        Schema::dropIfExists('pemesanan');
    }
};
