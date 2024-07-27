<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            AcademicYearSeeder::class,
            PaymentSeeder::class,
            PengeluaranSeeder::class,
            StudentSeeder::class,
            UserSeeder::class,
        ]);
    }
}
