<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentsExport implements FromArray, WithHeadings
{
  protected $payments;

  public function __construct($payments)
  {
    $this->payments = $payments;
  }

  public function array(): array
  {
    $data = [];

    foreach ($this->payments as $payment) {
      $data[] = [
        'student_name' => $payment->student->name,
        'student_nis' => $payment->student->nis,
        'class' => $payment->student->class,
        'academic_year' => $payment->academicYear->year,
        'month' => \Carbon\Carbon::create()->month($payment->month)->format('F'),
        'amount' => $payment->amount,
        'payment_date' => $payment->created_at->format('d-m-Y'),
      ];
    }

    return $data;
  }

  public function headings(): array
  {
    return [
      'Nama Siswa',
      'NIS',
      'Kelas',
      'Tahun Ajaran',
      'Bulan',
      'Jumlah',
      'Tanggal Pembayaran',
    ];
  }
}


