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
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nomor_hp');
            $table->foreignId('destinasi_id')->constrained('destinasiwisata')->onDelete('cascade');
            $table->enum('jenis_kendaraan', ['Bus', 'Mini Bus']);
            $table->enum('nomor_kursi_bus', [
                'B1', 'B2', 'B3', 'B4', 'B5',
                'B6', 'B7', 'B8', 'B9', 'B10',
                'B11', 'B12', 'B13', 'B14', 'B15',
                'B16', 'B17', 'B18', 'B19', 'B20',
                'B21', 'B22', 'B23', 'B24', 'B25',
                'B26', 'B27', 'B28', 'B29', 'B30',
                'B31', 'B32', 'B33', 'B34', 'B35',
                'B36', 'B37', 'B38', 'B39', 'B40',
                'B41', 'B42', 'B43', 'B44', 'B45'
            ])->nullable();
            $table->enum('nomor_kursi_minibus', [
                'MB1', 'MB2', 'MB3', 'MB4', 'MB5',
                'MB6', 'MB7', 'MB8', 'MB9', 'MB10',
                'MB11', 'MB12', 'MB13', 'MB14', 'MB15'
            ])->nullable();
            $table->enum('metode_pembayaran', ['transfer', 'ewallet', 'qris', 'cash']);
            $table->decimal('total_pembayaran', 10, 2);
            $table->date('tanggal');
            $table->enum('jam', ['09.00','12.00','15.00','17.00']);
            $table->enum('status_pembayaran', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->string('kursi_dipilih');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};
