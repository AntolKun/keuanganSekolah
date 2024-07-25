<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Payment;

class PaymentController extends Controller
{
  public function create($studentId)
  {
    $student = Student::findOrFail($studentId);
    return view('bayarSPP', compact('student'));
  }

  public function store(Request $request, $studentId)
  {
    $request->validate([
      'amount' => 'required|integer|min:1',
    ]);

    $student = Student::findOrFail($studentId);
    $payment = new Payment();
    $payment->student_id = $student->id;
    $payment->amount = $request->amount;
    $payment->save();

    $student->total_paid += $payment->amount;
    if ($student->total_paid >= $student->spp) {
      $student->is_paid = true;
    }
    $student->save();

    return redirect()->route('KwitansiSPP', $payment->id)->with('success', 'Berhasil membuat pembayaran');
  }

  public function receipt($paymentId)
  {
    $payment = Payment::findOrFail($paymentId);
    return view('KwitansiSPP', compact('payment'));
  }
}
