<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        Student::create([
            'name' => 'John Doe',
            'nis' => '123456',
            'dob' => '2005-01-01',
            'address' => '123 Main St',
            'spp' => 500000,
        ]);
    }
}

