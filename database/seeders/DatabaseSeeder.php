<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinasiWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destinasiwisata')->insert([
            [
                'jarak' => '150 km',
                'tujuan' => 'Bandung - Pangandaran',
                'image' => '/images/Pantai BT.jpg',
                'namawisata' => 'Pangandaran',
                'harga' => 'IDR 400.000',
                'deskripsiWisata' => NULL,
                'created_at' => '2024-12-18 19:51:52',
                'updated_at' => '2025-01-03 13:12:31',
            ],
            [
                'jarak' => '200 km',
                'tujuan' => 'Bandung - Anyer',
                'image' => '/images/anyer.jpg',
                'namawisata' => 'Anyer',
                'harga' => 'IDR 350.000',
                'deskripsiWisata' => NULL,
                'created_at' => '2024-12-18 19:51:52',
                'updated_at' => '2024-12-18 19:51:52',
            ],
            [
                'jarak' => '550 km',
                'tujuan' => 'Bandung - Karimun Jawa',
                'image' => '/images/sunsetKarimun.jpg',
                'namawisata' => 'Karimunjawa',
                'harga' => 'IDR 450.000',
                'deskripsiWisata' => NULL,
                'created_at' => '2024-12-18 19:51:52',
                'updated_at' => '2024-12-18 19:51:52',
            ],
            [
                'jarak' => '780 km',
                'tujuan' => 'Bandung - Brumo',
                'image' => '/images/sunsetKarimun.jpg',
                'namawisata' => 'Bromo',
                'harga' => 'IDR 650.000',
                'deskripsiWisata' => NULL,
                'created_at' => '2024-12-18 19:51:52',
                'updated_at' => '2024-12-18 19:51:52',
            ],
            [
                'jarak' => '830 km',
                'tujuan' => 'Bandung - Sindoro',
                'image' => '/images/gunung-sindoro.jpeg',
                'namawisata' => 'Sindoro',
                'harga' => 'IDR 700.000',
                'deskripsiWisata' => NULL,
                'created_at' => '2024-12-18 19:51:52',
                'updated_at' => '2024-12-18 19:51:52',
            ],
            [
                'jarak' => '1200 km',
                'tujuan' => 'Bandung - Kawah Ijen',
                'image' => '/images/kawah ijen.webp',
                'namawisata' => 'Ijen',
                'harga' => 'IDR 1.200.000',
                'deskripsiWisata' => NULL,
                'created_at' => '2024-12-18 19:51:52',
                'updated_at' => '2024-12-18 19:51:52',
            ],
        ]);
    }
}
