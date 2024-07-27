@extends('layouts.UserTemplate')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Data Siswa</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="/">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Data Siswa</li>
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
    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahStudent">
      <i class="fas fa-plus"></i> Tambah Siswa
    </a>
  </div>
</div>

<div class="modal fade" id="modalEditStudent" tabindex="-1" aria-labelledby="modalEditStudentLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title" id="modalEditStudentLabel">Edit Siswa</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form Edit Student -->
        <form action="{{ route('editSiswa', 'student_id') }}" method="POST" id="editStudentForm">
          @csrf
          @method('PUT')
          <div class="form-group my-4">
            <label for="editName">Nama</label>
            <input type="text" name="name" class="form-control" id="editName" required>
          </div>
          <div class="form-group my-4">
            <label for="editNis">NIS</label>
            <input type="text" name="nis" class="form-control" id="editNis" required>
          </div>
          <div class="form-group my-4">
            <label for="editDob">Tanggal Lahir</label>
            <input type="date" name="dob" class="form-control" id="editDob" required>
          </div>
          <div class="form-group my-4">
            <label for="editAddress">Alamat</label>
            <input type="text" name="address" class="form-control" id="editAddress" required>
          </div>
          <div class="form-group my-4">
            <label for="editSpp">SPP</label>
            <input type="number" name="spp" class="form-control" id="editSpp" required>
          </div>
          <div class="form-group my-4">
            <label for="editAcademicYear">Tahun Ajaran</label>
            <select name="academic_year_id" class="form-select" id="editAcademicYear" required>
              @foreach($academicYears as $year)
              <option value="{{ $year->id }}">{{ $year->year }}</option>
              @endforeach
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-light-success text-success font-medium waves-effect text-start" form="editStudentForm">Update Siswa</button>
        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalTambahStudent" tabindex="-1" aria-labelledby="modalTambahStudent" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title" id="myLargeModalLabel">
          Tambah Siswa
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('storeSiswa') }}" method="POST">
          @csrf
          <div class="form-group my-4">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" required>
          </div>
          <div class="form-group my-4">
            <label for="nis">NIS</label>
            <input type="text" name="nis" class="form-control" id="nis" required>
          </div>
          <div class="form-group my-4">
            <label for="dob">Tanggal Lahir</label>
            <input type="date" name="dob" class="form-control" id="dob" required>
          </div>
          <div class="form-group my-4">
            <label for="address">Alamat</label>
            <input type="text" name="address" class="form-control" id="address" required>
          </div>
          <div class="form-group my-4">
            <label for="spp">SPP</label>
            <input type="number" name="spp" class="form-control" id="spp" required>
          </div>
          <div class="form-group my-4">
            <label for="academic_year_id">Tahun Ajaran</label>
            <select name="academic_year_id" class="form-select" id="academic_year_id" required>
              @foreach($academicYears as $year)
              <option value="{{ $year->id }}">{{ $year->year }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-success text-black font-medium waves-effect text-start">
            Tambah Siswa
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

<table id="dataStudent" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th>Nama</th>
      <th>NIS</th>
      <th>Tanggal Lahir</th>
      <th>Alamat</th>
      <th>Tahun Ajaran</th>
      <th>SPP</th>
      <th width="400px">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($students as $student)
    <tr>
      <td>{{ $student->name }}</td>
      <td>{{ $student->nis }}</td>
      <td>{{ $student->dob }}</td>
      <td>{{ $student->address }}</td>
      <td>{{ $student->academicYear->year }}</td>
      <td>Rp. {{ number_format($student->spp, 2, ',', '.') }}</td>
      <td>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditStudent" data-id="{{ $student->id }}" data-name="{{ $student->name }}" data-nis="{{ $student->nis }}" data-dob="{{ $student->dob }}" data-address="{{ $student->address }}" data-spp="{{ $student->spp }}" data-academic_year_id="{{ $student->academic_year_id }}">
          Edit
        </button>
        <form action="{{ route('hapusSiswa', $student->id) }}" method="POST" style="display:inline;">
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
    $('#dataStudent').DataTable();
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
  function confirmDelete(studentId) {
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
        document.getElementById('delete-form-' + studentId).submit();
      }
    })
  }

  // Set up modal with student data
  document.addEventListener('DOMContentLoaded', function() {
    var editModal = document.getElementById('modalEditStudent');
    editModal.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var studentId = button.getAttribute('data-id');
      var studentName = button.getAttribute('data-name');
      var studentNis = button.getAttribute('data-nis');
      var studentDob = button.getAttribute('data-dob');
      var studentAddress = button.getAttribute('data-address');
      var studentSpp = button.getAttribute('data-spp');
      var studentYearId = button.getAttribute('data-academic_year_id');

      var form = editModal.querySelector('form');
      form.action = '{{ route("editSiswa", ":id") }}'.replace(':id', studentId);
      form.querySelector('#editName').value = studentName;
      form.querySelector('#editNis').value = studentNis;
      form.querySelector('#editDob').value = studentDob;
      form.querySelector('#editAddress').value = studentAddress;
      form.querySelector('#editSpp').value = studentSpp;
      form.querySelector('#editAcademicYear').value = studentYearId;
    });
  });
</script>
@endsection