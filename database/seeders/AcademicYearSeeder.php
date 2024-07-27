<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcademicYear;

class AcademicYearSeeder extends Seeder
{
    public function run()
    {
        // Menghapus data yang ada (opsional)
        AcademicYear::query()->delete();

        // Menambahkan data tahun ajaran
        AcademicYear::create(['year' => '2023/2024']);
        AcademicYear::create(['year' => '2024/2025']);
        AcademicYear::create(['year' => '2025/2026']);
        // Tambah data sesuai kebutuhan
    }
}
