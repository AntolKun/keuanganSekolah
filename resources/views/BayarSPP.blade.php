@extends('layouts.UserTemplate')

@section('content')
<div class="container">
  <h2>Pembayaran SPP untuk {{ $student->name }}</h2>

  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="mb-4 pt-4">
    <strong>Tahun Ajaran:</strong> {{ $academicYear->year }}
  </div>

  <form action="{{ route('simpanSPP', $student->id) }}" method="POST">
    @csrf
    <input type="hidden" name="academic_year_id" value="{{ $academicYear->id }}">

    <div class="form-group my-4">
      <label for="class">Kelas</label>
      <input type="text" class="form-control" id="class" name="class" value="{{ old('class', $student->class) }}" required>
    </div>

    <div class="form-group my-4">
      <label for="month">Bulan</label>
      <select class="form-control" id="month" name="month[]" multiple required style="font-size: 16px; height: 200px;">
        @foreach ($months as $monthNumber => $monthName)
        <option value="{{ $monthNumber }}">{{ $monthName }}</option>
        @endforeach
      </select>
      <small class="form-text text-muted">Pilih bulan yang ingin Anda bayar. Anda bisa memilih lebih dari satu bulan.</small>
    </div>

    <div class="form-group my-4">
      <label for="amount">Jumlah Pembayaran (per bulan)</label>
      <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $student->spp) }}" required>
      <small class="form-text text-muted">Jumlah pembayaran per bulan. Total pembayaran akan dikalikan dengan jumlah bulan yang dipilih.</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit Pembayaran</button>
  </form>
</div>
@endsection