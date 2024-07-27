<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Student;
use App\Models\AcademicYear;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        // Menghapus data yang ada (opsional)
        Payment::query()->delete();

        // Mendapatkan siswa dan tahun ajaran pertama
        $students = Student::all();
        $academicYear = AcademicYear::first();

        // Menambahkan data pembayaran
        foreach ($students as $student) {
            Payment::create([
                'student_id' => $student->id,
                'academic_year_id' => $academicYear->id,
                'month' => 1, // Januari
                'amount' => 500000, // Contoh jumlah pembayaran
                'is_paid' => false,
            ]);

            Payment::create([
                'student_id' => $student->id,
                'academic_year_id' => $academicYear->id,
                'month' => 2, // Februari
                'amount' => 500000, // Contoh jumlah pembayaran
                'is_paid' => false,
            ]);
            // Tambah data sesuai kebutuhan
        }
    }
}
