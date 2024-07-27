<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\AcademicYear;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Menghapus data yang ada (opsional)
        Student::query()->delete();

        // Mendapatkan tahun ajaran pertama (atau sesuaikan dengan ID yang diinginkan)
        $academicYear = AcademicYear::first();

        // Menambahkan data siswa
        Student::create([
            'name' => 'John Doe',
            'nis' => '1234567890',
            'dob' => '2005-08-15',
            'address' => 'Jl. Contoh No. 1',
            'spp' => 5000000,
            'total_paid' => 0,
            'is_paid' => false,
            'academic_year_id' => $academicYear->id,
        ]);

        Student::create([
            'name' => 'Jane Smith',
            'nis' => '0987654321',
            'dob' => '2006-12-20',
            'address' => 'Jl. Contoh No. 2',
            'spp' => 6000000,
            'total_paid' => 0,
            'is_paid' => false,
            'academic_year_id' => $academicYear->id,
        ]);
        // Tambah data sesuai kebutuhan
    }
}
