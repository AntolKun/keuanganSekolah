<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('DataSiswa', compact('students'));
    }

    public function pembayaran()
    {
        $students = Student::all();
        return view('DataPembayaran', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:students',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'spp' => 'required|numeric',
        ]);

        try {
            Student::create([
                'name' => $request->name,
                'nis' => $request->nis,
                'dob' => $request->dob,
                'address' => $request->address,
                'spp' => $request->spp,
                'total_paid' => $request->total_paid ?? 0,
                'is_paid' => $request->is_paid ?? false,
            ]);

            return back()->with('success', 'Berhasil menambahkan siswa');
        } catch (\Exception $e) {
            Log::error('Error storing student: ' . $e->getMessage());
            return back()->with('error', 'Terjadi error, Gagal menambahkan Siswa');
        }
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:students,nis,' . $student->id,
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'spp' => 'required|numeric',
        ]);

        try {
            $student->update([
                'name' => $request->name,
                'nis' => $request->nis,
                'dob' => $request->dob,
                'address' => $request->address,
                'spp' => $request->spp,
                'total_paid' => $request->total_paid ?? $student->total_paid,
                'is_paid' => $request->is_paid ?? $student->is_paid,
            ]);

            return back()->with('success', 'Siswa berhasil di update');
        } catch (\Exception $e) {
            Log::error('Error updating student: ' . $e->getMessage());
            return back()->with('error', 'Terjadi error, Siswa gagal di update');
        }
    }

    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();

            return back()->with('success', 'Berhasil menghapus siswa');
        } catch (\Exception $e) {
            Log::error('Error deleting student: ' . $e->getMessage());
            return back()->with('error', 'Terjadi error, Gagal menghapus siswa');
        }
    }
}
