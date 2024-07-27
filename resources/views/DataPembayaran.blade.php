@extends('layouts.UserTemplate')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Data Pembayaran SPP</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="/">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Data Pembayaran SPP</li>
          </ol>
        </nav>
      </div>
      <div class="col-3">
        <div class="text-center mb-n5">
          <img src="{{ asset('dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mb-3">
  <a href="{{ route('exportRekapGanjil') }}" class="btn btn-success">Rekap Ganjil (Jan-Jun)</a>
  <a href="{{ route('exportRekapGenap') }}" class="btn btn-primary">Rekap Genap (Jul-Dec)</a>
</div>


<table id="dataStudent" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th width="200px">Nama</th>
      <th width="100px">NIS</th>
      <th width="150px">SPP</th>
      <th width="150px">Total Dibayar</th>
      <th width="150px">Sisa SPP</th>
      <th width="100px">Status</th>
      <th width="200px">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($students as $student)
    <tr>
      <td>{{ $student->name }}</td>
      <td>{{ $student->nis }}</td>
      <td>Rp. {{ number_format($student->spp, 2, ',', '.') }}</td>
      <td>Rp. {{ number_format($student->total_paid, 2, ',', '.') }}</td>
      <td>Rp. {{ number_format($student->spp * 12 - $student->total_paid, 2, ',', '.') }}</td>
      <td>{{ $student->is_paid ? 'Lunas' : 'Belum Lunas' }}</td>
      <td>
        @if (!$student->is_paid)
        <a href="{{ route('bayarSPP', $student->id) }}" class="btn btn-info">Bayar</a>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
  $(document).ready(function() {
    $('#dataStudent').DataTable({
      scrollX: true
    });
  });
</script>
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
@endsection