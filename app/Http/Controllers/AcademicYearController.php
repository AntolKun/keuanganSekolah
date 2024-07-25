<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicYears = AcademicYear::all();
        return view('DataTahunPelajaran', compact('academicYears'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|string|max:255|unique:academic_years,year',
        ]);

        try {
            AcademicYear::create(['year' => $request->year]);

            return back()->with('success', 'Berhasil Menambahkan Tahun Ajaran');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan, data gagal tersimpan');
        }
    }

    public function update(Request $request, AcademicYear $academicYear)
    {
        $request->validate([
            'year' => 'required|string|max:255|unique:academic_years,year,' . $academicYear->id,
        ]);

        try {
            $academicYear->update(['year' => $request->year]);

            return back()->with('success', 'Tahun Ajaran Berhasil Diupdate');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan, data gagal terupdate');
        }
    }

    public function destroy(AcademicYear $academicYear)
    {
        try {
            $academicYear->delete();
            return back()->with('success', 'Tahun Ajaran Berhasil Dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan, data gagal dihapus');
        }
    }
}
