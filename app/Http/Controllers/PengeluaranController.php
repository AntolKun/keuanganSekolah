<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
  public function index()
  {
    $pengeluarans = Pengeluaran::all();
    return view('DataPengeluaran', compact('pengeluarans'));
  }

  // public function create()
  // {
  //   return view('pengeluaran.create');
  // }

  public function store(Request $request)
  {
    $request->validate([
      'deskripsi' => 'required|string|max:255',
      'jumlah' => 'required|integer',
      'tanggal' => 'required|date',
    ]);

    Pengeluaran::create($request->all());

    return back()->with('success', 'Pengeluaran berhasil ditambahkan.');
  }

  public function show($id)
  {
    $pengeluaran = Pengeluaran::find($id);
    return view('LihatPengeluaran', compact('pengeluaran'));
  }

  // public function edit($id)
  // {
  //   $pengeluaran = Pengeluaran::find($id);
  //   return view('pengeluaran.edit', compact('pengeluaran'));
  // }

  public function update(Request $request, $id)
  {
    $request->validate([
      'deskripsi' => 'required|string|max:255',
      'jumlah' => 'required|integer',
      'tanggal' => 'required|date',
    ]);

    $pengeluaran = Pengeluaran::find($id);
    $pengeluaran->update($request->all());

    return back()->with('success', 'Pengeluaran berhasil diupdate.');
  }

  public function destroy($id)
  {
    Pengeluaran::find($id)->delete();
    return back()->with('success', 'Pengeluaran berhasil dihapus.');
  }

  public function kwitansi($id)
  {
    $pengeluaran = Pengeluaran::find($id);
    return view('KwitansiPengeluaran', compact('pengeluaran'));
  }
}
