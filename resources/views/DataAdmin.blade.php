@extends('layouts.UserTemplate')
@section('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Data Admin</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted " href="/">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Data admin</li>
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
    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahAdmin">
      <i class="fas fa-plus"></i> Tambah Admin
    </a>
  </div>
</div>

<div class="modal fade" id="modalEditAdmin" tabindex="-1" aria-labelledby="modalEditAdminLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title" id="modalEditAdminLabel">Edit Admin</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form Edit Admin -->
        <form action="{{ route('editAdmin', 'admin_id') }}" method="POST" id="editAdminForm">
          @csrf
          @method('PUT')
          <div class="form-group my-4">
            <label for="editName">Name</label>
            <input type="text" name="name" class="form-control" id="editName" required>
          </div>
          <div class="form-group my-4">
            <label for="editEmail">Email</label>
            <input type="email" name="email" class="form-control" id="editEmail" required>
          </div>
          <div class="form-group my-4">
            <label for="editPassword">Password (kosongkan bila tidak ingin diganti)</label>
            <input type="password" name="password" class="form-control" id="editPassword">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-light-success text-success font-medium waves-effect text-start" form="editAdminForm">Update Admin</button>
        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalTambahAdmin" tabindex="-1" aria-labelledby="modalTambahAdmin" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title" id="myLargeModalLabel">
          Tambah Admin
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('storeAdmin') }}" method="POST">
          @csrf
          <div class="form-group my-4">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
          </div>
          <div class="form-group my-4">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
          </div>
          <div class="form-group my-4">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
          </div>
          <button type="submit" class="btn btn-success text-black font-medium waves-effect text-start">
            Tambah Admin
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

<table id="dataAdmin" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Email</th>
      <th width="400px">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($admins as $admin)
    <tr>
      <td>{{ $admin->name }}</td>
      <td>{{ $admin->email }}</td>
      <td>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditAdmin" data-id="{{ $admin->id }}" data-name="{{ $admin->name }}" data-email="{{ $admin->email }}">Edit</button>
        <form action="{{ route('hapusAdmin', $admin->id) }}" method="POST" style="display:inline;">
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
  $(document).ready(function() {
    $('#dataAdmin').DataTable();
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
  function confirmDelete(adminId) {
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
        document.getElementById('delete-form-' + adminId).submit();
      }
    })
  }
</script>

<script>
  // Mengatur modal edit dengan data admin
  document.addEventListener('DOMContentLoaded', function() {
    var editModal = document.getElementById('modalEditAdmin');
    editModal.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var adminId = button.getAttribute('data-id');
      var adminName = button.getAttribute('data-name');
      var adminEmail = button.getAttribute('data-email');

      var form = editModal.querySelector('form');
      form.action = '{{ route("editAdmin", ":id") }}'.replace(':id', adminId);
      form.querySelector('#editName').value = adminName;
      form.querySelector('#editEmail').value = adminEmail;
    });
  });
</script>

@endsection