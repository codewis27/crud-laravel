@extends('layouts.default')

@section('content')
          <div class="card">
              <div class="card-header">
                <a href="{{ route('employee.create') }}"><button type="button" class="btn btn-success">Insert Data</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1
                    ?>
                    @foreach ($data as $row)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->gender}}</td>
                        <td>0{{$row->contact}}</td>
                        <td>
                            <a href="{{ route('employee.edit', ['employee' => $row->id]) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('employee.destroy', ['employee' => $row->id]) }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="btn btn-danger bg-danger delete">Delete</button>
                           </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>   
@endsection

@section ('script')
  <script>
    @if (Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
    @endif

    $(".delete").each(function () {
      $(this).on('click', function (e){
          e.preventDefault();
          let form = $(this).parent();
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.isConfirmed) {
                  form.submit();
                  Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                  )
              }
          })
      });
    });
  </script>
  <script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "lengthMenu": [ 5, 10, 50, 75, 100 ],
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
