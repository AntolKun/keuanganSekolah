@extends('layouts.UserTemplate')

@section('content')
<div class="container">
  <h2>Make Payment for {{ $student->name }}</h2>

  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('simpanSPP', $student->id) }}" method="POST">
    @csrf
    <div class="form-group my-4">
      <label for="amount">Amount</label>
      <input type="number" class="form-control" id="amount" name="amount" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit Payment</button>
  </form>
</div>
@endsection