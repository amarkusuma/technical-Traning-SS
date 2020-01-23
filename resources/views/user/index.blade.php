@extends('adminlte::page')

<!DOCTYPE html>
<html lang="en">
<head>
<title>DataTable Users </title>
@section ('css')

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@stop

@section ('js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
   $(document).ready( function () {
    $('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ route('dataTable.user') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'frist_name', name: 'frist_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'phone_number', name: 'phone_number' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'gender', name: 'gender' }
                 ]
        });
     });

  </script>
@stop

</head>

@section ('content')

      <body>
         <div class="container">
               <h2>DataTable Users </h2>
            <table class="table table-bordered" id="laravel_datatable">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Frist Name</th>
                     <th>Last Name</th>
                     <th>Phone Number</th>
                     <th>Address</th>
                     <th>Gender</th>
                     {{-- <th>Action</th> --}}
                  </tr>
               </thead>
            </table>
         </div>

   </body>
   @stop
</html>
