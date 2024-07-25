<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\AcademicYear;

class AcademicYearSeeder extends Seeder
{
    public function run()
    {
        AcademicYear::create([
            'year' => '2023/2024',
        ]);
    }
}
