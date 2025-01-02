<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('destinasiWisata', function (Blueprint $table) {
            $table->id();
            $table->string('jarak');
            $table->string('tujuan');
            $table->string('image');
            $table->string('harga');
            $table->string('deskripsiWisata')->nullable();
            $table->timestamps();
        });

        // Insert default data into the 'destinasi' table
        DB::table('destinasiWisata')->insert([
            [
                'jarak' => '150 km',
                'tujuan' => 'Bandung - Pangandaran',
                'image' => '/images/Pantai BT.jpg',
                'harga' => 'IDR 150.000',
                'deskripsiWisata' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jarak' => '450 km',
                'tujuan' => 'Bandung - Anyer',
                'image' => '/images/anyer.jpg',
                'harga' => 'IDR 350.000',
                'deskripsiWisata' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jarak' => '550 km',
                'tujuan' => 'Bandung - Karimun Jawa',
                'image' => '/images/sunsetKarimun.jpg',
                'harga' => 'IDR 450.000',
                'deskripsiWisata' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jarak' => '780 km',
                'tujuan' => 'Bandung - Brumo',
                'image' => '/images/sunsetKarimun.jpg',
                'harga' => 'IDR 650.000',
                'deskripsiWisata' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jarak' => '830 km',
                'tujuan' => 'Bandung - Sindoro',
                'image' => '/images/gunung-sindoro.jpeg',
                'harga' => 'IDR 700.000',
                'deskripsiWisata' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jarak' => '1200 km',
                'tujuan' => 'Bandung - Kawah Ijen',
                'image' => '/images/kawah ijen.webp',
                'harga' => 'IDR 1.200.000',
                'deskripsiWisata' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('destinasiWisata');
    }
};
