@extends('layouts.UserTemplate')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Data Pengeluaran</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted " href="/">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Data Pengeluaran</li>
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

<div class="row mb-3 justify-content-end">
  <div class="col-auto">
    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPengeluaran">
      <i class="fas fa-plus"></i> Tambah Pengeluaran
    </a>
  </div>
</div>

<!-- Modal Tambah Pengeluaran -->
<div class="modal fade" id="modalTambahPengeluaran" tabindex="-1" aria-labelledby="modalTambahPengeluaran" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title" id="modalTambahPengeluaranLabel">Tambah Pengeluaran</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('storePengeluaran') }}" method="POST">
          @csrf
          <div class="form-group my-4">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
          </div>
          <div class="form-group my-4">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah" required>
          </div>
          <div class="form-group my-4">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" required>
          </div>
          <button type="submit" class="btn btn-success text-black font-medium waves-effect text-start">
            Tambah Pengeluaran
          </button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start" data-bs-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Pengeluaran -->
<div class="modal fade" id="modalEditPengeluaran" tabindex="-1" aria-labelledby="modalEditPengeluaranLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title" id="modalEditPengeluaranLabel">Edit Pengeluaran</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('updatePengeluaran', 'pengeluaran_id') }}" method="POST" id="editPengeluaranForm">
          @csrf
          @method('PUT')
          <div class="form-group my-4">
            <label for="editDeskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="editDeskripsi" required>
          </div>
          <div class="form-group my-4">
            <label for="editJumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="editJumlah" required>
          </div>
          <div class="form-group my-4">
            <label for="editTanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="editTanggal" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-light-success text-success font-medium waves-effect text-start" form="editPengeluaranForm">Update Pengeluaran</button>
        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<table id="dataPengeluaran" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th>Deskripsi</th>
      <th>Jumlah</th>
      <th>Tanggal</th>
      <th width="400px">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($pengeluarans as $pengeluaran)
    <tr>
      <td>{{ $pengeluaran->deskripsi }}</td>
      <td>Rp. {{ number_format($pengeluaran->jumlah, 2, ',', '.') }}</td>
      <td>{{ $pengeluaran->tanggal }}</td>
      <td>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditPengeluaran" data-id="{{ $pengeluaran->id }}" data-deskripsi="{{ $pengeluaran->deskripsi }}" data-jumlah="{{ $pengeluaran->jumlah }}" data-tanggal="{{ $pengeluaran->tanggal }}">Edit</button>
        <form action="{{ route('hapusPengeluaran', $pengeluaran->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
        <a href="{{ route('kwitansiPengeluaran', $pengeluaran->id) }}" class="btn btn-info">Lihat Kwitansi</a>
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
    $('#dataPengeluaran').DataTable();
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

<script>
  function confirmDelete(pengeluaranId) {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data ini akan dihapus secara permanen!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('delete-form-' + pengeluaranId).submit();
      }
    })
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var editModal = document.getElementById('modalEditPengeluaran');
    editModal.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var pengeluaranId = button.getAttribute('data-id');
      var pengeluaranDeskripsi = button.getAttribute('data-deskripsi');
      var pengeluaranJumlah = button.getAttribute('data-jumlah');
      var pengeluaranTanggal = button.getAttribute('data-tanggal');

      var form = editModal.querySelector('form');
      form.action = '{{ route("updatePengeluaran", ":id") }}'.replace(':id', pengeluaranId);
      form.querySelector('#editDeskripsi').value = pengeluaranDeskripsi;
      form.querySelector('#editJumlah').value = pengeluaranJumlah;
      form.querySelector('#editTanggal').value = pengeluaranTanggal;
    });
  });
</script>

@endsection