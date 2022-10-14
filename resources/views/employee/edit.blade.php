@extends('layouts.default')

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Employee Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('employee.update', ['employee' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                 @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror " name="name" id="name" value="{{$data->name}}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="gender" class="form-label  @error('gender') is-invalid @enderror">Gender</label>
                                <select class="form-control" name="gender" aria-label="Default select example">
                                  <option selected> {{$data->gender}}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                    @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="number" class="form-control @error('contact') is-invalid @enderror" name="contact" id="contact" value="0{{$data->contact}}">
                  </div>
                  @error('contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <a href="{{ route('employee.index') }}"> <button type="button" class="btn btn-danger">Cancel</button></a>
                </div>
              </form>
            </div>
@endsection
