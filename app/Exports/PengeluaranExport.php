<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengeluaranExport implements FromArray, WithHeadings
{
  protected $pengeluarans;

  public function __construct($pengeluarans)
  {
    $this->pengeluarans = $pengeluarans;
  }

  public function array(): array
  {
    $data = [];

    foreach ($this->pengeluarans as $pengeluaran) {
      $data[] = [
        'deskripsi' => $pengeluaran->deskripsi,
        'jumlah' => $pengeluaran->jumlah,
        'tanggal' => \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d-m-Y'),
      ];
    }

    return $data;
  }

  public function headings(): array
  {
    return [
      'Deskripsi',
      'Jumlah',
      'Tanggal',
    ];
  }
}

