<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kwitansi Pengeluaran</title>
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
      <h2>Kwitansi Pengeluaran</h2>
      <h5>SMA Negeri 1 Gedong Tataan</h5>
    </div>

    <div class="content">
      <div><strong>Deskripsi:</strong> {{ $pengeluaran->deskripsi }}</div>
      <div><strong>Harga:</strong> Rp. {{ number_format($pengeluaran->jumlah, 2, ',', '.') }}</div>
      <div><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d F Y') }}</div>
    </div>

    <div class="signature">
      <!-- <div><strong>Petugas</strong></div> -->
      <div style="margin-top: 60px;">(............................)</div>
    </div>

    <div class="footer">
      <p>Terima kasih telah mengelola pengeluaran dengan baik.</p>
    </div>
  </div>

  <div class="text-center mt-4">
    <a href="{{ route('DataPengeluaran') }}" class="btn btn-danger">Kembali</a>
    <button class="btn btn-primary" onclick="window.print()">Print Kwitansi</button>
  </div>
</body>

<script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<script src="{{ asset('dist/js/app.init.js')}}"></script>
<script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('dist/js/custom.js') }}"></script>
<script src="{{ asset('dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('dist/js/dashboard.js') }}"></script>
<script src="{{ asset('dist/js/dashboard3.js') }}"></script>
<script src="{{ asset('dist/libs/fullcalendar/index.global.min.js') }}"></script>
<script src="{{ asset('dist/js/apps/calendar-init.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($message = session()->get('success'))
<script type="text/javascript">
  Swal.fire({
    icon: 'success',
    title: 'Sukses!',
    text: '{{ $message }}',
  })
</script>
@endif

@if ($message = session()->get('error'))
<script type="text/javascript">
  Swal.fire({
    icon: 'error',
    title: 'Waduh!',
    text: '{{ $message }}',
  })
</script>
@endif

</html>