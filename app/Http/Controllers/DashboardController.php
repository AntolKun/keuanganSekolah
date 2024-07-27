<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Pengeluaran;
use Carbon\Carbon;

class DashboardController extends Controller
{
  public function index()
  {
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    // Query for total revenue this month
    $totalRevenue = Payment::whereYear('created_at', $currentYear)
      ->whereMonth('created_at', $currentMonth)
      ->sum('amount');

    // Query for total expenses this month
    $totalExpenses = Pengeluaran::whereYear('tanggal', $currentYear)
      ->whereMonth('tanggal', $currentMonth)
      ->sum('jumlah');

    return view('Dashboard', compact('totalRevenue', 'totalExpenses'));
  }
}
