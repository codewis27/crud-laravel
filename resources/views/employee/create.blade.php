@extends('layouts.default')

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Employee Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data" id="quickForm">
                 @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror " name="name" id="name" placeholder="Insert Name" value="{{ old('name') }}" autofocus >
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="gender" class="form-label">Gender</label>
                                <select class="form-control" name="gender" aria-label="Default select example">
                                    <option value="Male" selected>Choose Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                  </div>
                  <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="number" class="form-control  @error('contact') is-invalid @enderror" name="contact" id="contact" placeholder="Insert Contact" value="{{ old('contact') }}">
                  </div>
                    @error('contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Insert</button>
                   <a href="{{ route('employee.index') }}"> <button type="button" class="btn btn-danger">Cancel</button></a>
                </div>
              </form>
            </div>
@endsection