<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view('DataAdmin', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return back()->with('success', 'Berhasil Menambahkan Admin');
        } catch (\Exception $e) {
            Log::error('Error storing admin: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan, data gagal tersimpan');
        }
    }

    // public function edit(User $admin)
    // {
    //     return view('admins.edit', compact('admin'));
    // }

    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:6',
        ]);

        try {
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $admin->password,
            ]);

            return back()->with('success', 'Admin updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing admin: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan, data gagal terupdate');
        }
    }

    public function destroy($id)
    {
        try {
            $admin = User::findOrFail($id);
            $admin->delete();
            
            return back()->with('success', 'Admin deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting admin: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan, data gagal dihapus');
        }
    }
}