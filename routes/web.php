<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PengeluaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dataAdmin', [AdminController::class, 'index'])->name('dataAdmin');
Route::post('/storeAdmin', [AdminController::class, 'store'])->name('storeAdmin');
Route::put('editAdmin/{admin}', [AdminController::class, 'update'])->name('editAdmin');
Route::delete('hapusAdmin/{id}', [AdminController::class, 'destroy'])->name('hapusAdmin');

Route::get('/dataSiswa', [StudentController::class, 'index'])->name('dataSiswa');
Route::post('/storeSiswa', [StudentController::class, 'store'])->name('storeSiswa');
Route::put('editSiswa/{student}', [StudentController::class, 'update'])->name('editSiswa');
Route::delete('hapusSiswa/{student}', [StudentController::class, 'destroy'])->name('hapusSiswa');

Route::get('/dataTahunPelajaran', [AcademicYearController::class, 'index'])->name('dataTahunPelajaran');
Route::post('/storeTahunPelajaran', [AcademicYearController::class, 'store'])->name('storeTahunPelajaran');
Route::put('editTahunPelajaran/{academicYear}', [AcademicYearController::class, 'update'])->name('editTahunPelajaran');
Route::delete('hapusTahunPelajaran/{academicYear}', [AcademicYearController::class, 'destroy'])->name('hapusTahunPelajaran');

Route::get('/dataPembayaran', [StudentController::class, 'pembayaran'])->name('dataPembayaran');
Route::get('/siswa/{student}/payments/create', [PaymentController::class, 'create'])->name('bayarSPP');
Route::post('/siswa/{student}/payments', [PaymentController::class, 'store'])->name('simpanSPP');
Route::get('/siswa/{studentId}/kwitansi', [PaymentController::class, 'receipt'])->name('KwitansiSPP');
Route::get('/export-rekap-ganjil', [PaymentController::class, 'exportRekapGanjil'])->name('exportRekapGanjil');
Route::get('/export-rekap-genap', [PaymentController::class, 'exportRekapGenap'])->name('exportRekapGenap');

Route::get('/dataPengeluaran', [PengeluaranController::class, 'index'])->name('DataPengeluaran');
Route::post('pengeluaran', [PengeluaranController::class, 'store'])->name('storePengeluaran');
Route::get('pengeluaran/{id}', [PengeluaranController::class, 'show'])->name('showPengeluaran');
Route::put('pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('updatePengeluaran');
Route::delete('pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('hapusPengeluaran');
Route::get('pengeluaran/{id}/kwitansi', [PengeluaranController::class, 'kwitansi'])->name('kwitansiPengeluaran');
Route::get('rekap-ganjil', [PengeluaranController::class, 'rekapGanjil'])->name('exportPengeluaranGanjil');
Route::get('rekap-genap', [PengeluaranController::class, 'rekapGenap'])->name('exportPengeluaranGenap');

