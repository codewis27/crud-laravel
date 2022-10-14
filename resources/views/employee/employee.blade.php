@extends('layouts.default')

@section('content')
          <div class="card">
              <div class="card-header">
                <a href="/create"><button type="button" class="btn btn-success">Insert Data</button></a>
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
                            <a href="/edit/{{$row->id}}" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}">Delete</a>
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
  <script>
    $('.delete').click(function(){
      var id = $(this).attr('data-id');
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
          window.location = "/delete/"+id+""
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })

    });
  </script>
@endsection
