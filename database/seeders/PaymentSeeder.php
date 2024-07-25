<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        Payment::create([
            'student_id' => 1,
            'amount' => 0,
        ]);
    }
}

