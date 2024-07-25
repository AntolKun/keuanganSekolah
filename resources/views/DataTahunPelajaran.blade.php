@extends('layouts.UserTemplate')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Data Academic Years</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="/">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Data Academic Years</li>
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
    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahYear">
      <i class="fas fa-plus"></i> Tambah Tahun Ajaran
    </a>
  </div>
</div>

<div class="modal fade" id="modalTambahYear" tabindex="-1" aria-labelledby="modalTambahYear" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title" id="myLargeModalLabel">
          Tambah Tahun Ajaran
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('storeTahunPelajaran') }}" method="POST">
          @csrf
          <div class="form-group my-4">
            <label for="year">Tahun Ajaran</label>
            <input type="text" name="year" class="form-control" id="year" required>
          </div>
          <button type="submit" class="btn btn-success text-black font-medium waves-effect text-start">
            Tambah Tahun Ajaran
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

<div class="modal fade" id="modalEditYear" tabindex="-1" aria-labelledby="modalEditYearLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title" id="modalEditYearLabel">Edit Tahun Ajaran</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('editTahunPelajaran', 'year_id') }}" method="POST" id="editYearForm">
          @csrf
          @method('PUT')
          <div class="form-group my-4">
            <label for="editYear">Tahun Ajaran</label>
            <input type="text" name="year" class="form-control" id="editYear" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-light-success text-success font-medium waves-effect text-start" form="editYearForm">Update Tahun Ajaran</button>
        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<table id="dataAcademicYear" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th>Tahun Ajaran</th>
      <th width="200px">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($academicYears as $year)
    <tr>
      <td>{{ $year->year }}</td>
      <td>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditYear" data-id="{{ $year->id }}" data-year="{{ $year->year }}">Edit</button>
        <form action="{{ route('hapusTahunPelajaran', $year->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
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
    $('#dataAcademicYear').DataTable();
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
  // Mengatur modal edit dengan data tahun ajaran
  document.addEventListener('DOMContentLoaded', function() {
    var editModal = document.getElementById('modalEditYear');
    editModal.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var yearId = button.getAttribute('data-id');
      var year = button.getAttribute('data-year');

      var form = editModal.querySelector('form');
      form.action = '{{ route("editTahunPelajaran", ":id") }}'.replace(':id', yearId);
      form.querySelector('#editYear').value = year;
    });
  });
</script>

@endsection