<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Payment;
use App\Models\AcademicYear;

class PaymentController extends Controller
{
  public function create($studentId)
  {
    $student = Student::findOrFail($studentId);
    $academicYear = $student->academicYear; // Ambil tahun akademik terkait siswa

    // Get paid months
    $paidMonths = Payment::where('student_id', $studentId)
      ->where('academic_year_id', $academicYear->id)
      ->pluck('month')
      ->toArray();

    // Available months
    $allMonths = [
      1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
      5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
      9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];

    // Filter out paid months
    $months = array_diff_key($allMonths, array_flip($paidMonths));

    return view('bayarSPP', compact('student', 'academicYear', 'months'));
  }


  public function store(Request $request, $studentId)
  {
    $request->validate([
      'amount' => 'required|integer|min:1',
      'academic_year_id' => 'required|exists:academic_years,id',
      'month' => 'required|array|min:1',
      'month.*' => 'integer|between:1,12',
    ]);

    $student = Student::findOrFail($studentId);
    $months = $request->month;
    $amountPerMonth = $request->amount;
    $totalAmount = $amountPerMonth * count($months);

    foreach ($months as $month) {
      Payment::create([
        'student_id' => $student->id,
        'academic_year_id' => $request->academic_year_id,
        'month' => $month,
        'amount' => $amountPerMonth,
        'is_paid' => true,
      ]);
    }

    // Update total paid and is_paid status for the student
    $student->total_paid += $totalAmount;
    $student->is_paid = $student->total_paid >= $student->spp * 12; // Assuming SPP is a monthly fee
    $student->save();

    return redirect()->route('KwitansiSPP', ['studentId' => $student->id])->with('success', 'Berhasil membuat pembayaran');
  }


  public function receipt($studentId)
  {
    $student = Student::findOrFail($studentId);
    $payments = Payment::where('student_id', $studentId)
      ->where('is_paid', true)
      ->get();

    if ($payments->isEmpty()) {
      return redirect()->route('dataPembayaran', $studentId)->with('error', 'Tidak ada pembayaran ditemukan.');
    }

    // Get the months and their ranges
    $months = $payments->pluck('month')->unique()->sort()->values();
    $startMonth = $months->first();
    $endMonth = $months->last();
    $monthRange = $this->getMonthName($startMonth) . ' - ' . $this->getMonthName($endMonth);

    // Calculate total amount
    $totalAmount = $payments->sum('amount');

    return view('KwitansiSPP', compact('student', 'monthRange', 'totalAmount', 'payments'));
  }

  private function getMonthName($monthNumber)
  {
    $months = [
      1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
      5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
      9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
    return $months[$monthNumber] ?? 'Unknown';
  }

  public function revenueChart()
  {
    $monthlyRevenue = Payment::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
    ->groupBy('month')
    ->orderBy('month')
    ->get();

    // Prepare data for the chart
    $months = [];
    $totals = [];

    foreach ($monthlyRevenue as $revenue) {
      $months[] = date('F', mktime(0, 0, 0, $revenue->month, 1));
      $totals[] = $revenue->total;
    }

    return view('welcome', compact('months', 'totals'));
  }

}
