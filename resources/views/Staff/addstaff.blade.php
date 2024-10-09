@extends('layouts.app')

@section('title', 'Add Staff')

@section('contents')
<div class="container-fluid">

  <!-- Display Success Message -->
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

  <div class="container mt-2">
    <div class="row">
      <div class="col-lg-12 margin-tb">
        <div class="float-right">
          <a class="btn btn-success" href="{{ route('dashboard.staff') }}" enctype="multipart/form-data">Back</a>
        </div>
      </div>
    </div>

    <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name"><strong>Staff Name:</strong></label>
        <input type="text" name="name" class="form-control" placeholder="Staff Name">
        @error('name')
          <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email"><strong>Email:</strong></label>
        <input type="email" id="email" name="email" class="form-control" placeholder="name@igsprotech.com.my">
        @error('email')
          <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="department"><strong>Department:</strong></label>
        <select name="department" class="form-control">
          <option value="">Select</option>
          <option value="Application">Application</option>
          <option value="Database">Database</option>
          <option value="Infra">Infra</option>
        </select>
        @error('department')
          <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="phoneNo"><strong>Phone Number:</strong></label>
        <input type="text" name="phoneNo" class="form-control" placeholder="Phone Number">
        @error('phoneNo')
          <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
@endsection
