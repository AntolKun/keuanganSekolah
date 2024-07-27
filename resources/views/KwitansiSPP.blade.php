<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kwitansi Pembayaran</title>
  <link rel="stylesheet" href="{{ asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
  <link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    .container {
      width: 70%;
      margin: auto;
      border: 1px solid #000;
      padding: 20px;
      position: relative;
    }

    .header,
    .footer {
      text-align: center;
    }

    .header img {
      position: absolute;
      left: 20px;
      top: 5px;
      width: 80px;
      height: auto;
    }

    .content {
      margin: 20px 0;
    }

    .content div {
      margin-bottom: 10px;
    }

    .signature {
      margin-top: 50px;
      text-align: right;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <img src="{{ asset('dist/images/logosma.png') }}" alt="Logo SMA">
      <h2>Kwitansi Pembayaran SPP</h2>
      <h5>SMA Negeri 1 Gedong Tataan</h5>
    </div>

    <div class="content">
      <div><strong>Nama:</strong> {{ $student->name }}</div>
      <div><strong>NIS:</strong> {{ $student->nis }}</div>
      <div><strong>Tahun Ajaran:</strong> {{ $payments->first()->academicYear->year }}</div>
      <div><strong>Bulan Pembayaran:</strong> {{ $monthRange }}</div>
      <div><strong>Total Jumlah Dibayar:</strong> Rp. {{ number_format($totalAmount, 2, ',', '.') }}</div>
    </div>

    <div class="signature">
      <div style="margin-top: 60px;">(............................)</div>
    </div>

    <div class="footer">
      <p>Terima kasih telah melakukan pembayaran.</p>
    </div>
  </div>

  <div class="text-center mt-4">
    <a href="{{ route('dataPembayaran', $student->id) }}" class="btn btn-danger">Kembali</a>
    <button class="btn btn-primary" onclick="window.print()">Print Kwitansi</button>
  </div>
</body>

</html>