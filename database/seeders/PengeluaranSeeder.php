<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PengeluaranSeeder extends Seeder
{
    public function run()
    {
        DB::table('pengeluaran')->insert([
            'deskripsi' => 'Pembelian Alat Tulis',
            'jumlah' => 500000,
            'tanggal' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

