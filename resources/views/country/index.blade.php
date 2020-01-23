@extends('adminlte::page')
<!DOCTYPE html>

<html lang="en">
<head>
<title> DataTable Counties </title>

@section('css')
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@stop

@section('js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

   <script>
   $(document).ready( function () {
    $('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ route('dataTable.country') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'alpha2_code', name: 'alpha2_code' },
                    { data: 'alpha3_code', name: 'alpha3_code' },
                    { data: 'calling_code', name: 'calling_code' },
                    { data: 'demonym', name: 'demonym' },
                    { data: 'flag', name: 'flag' },

                 ]
        });
     });
  </script>
@stop
</head>

@section('content')
      <body>
         <div class="container">
               <h2>DataTable Countries </h2>
            <table class="table table-bordered" id="laravel_datatable">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Alpha2Code</th>
                     <th>Alpha3Code</th>
                     <th>CallingCodes</th>
                     <th>Demonym</th>
                     <th>flag</th>

                     {{-- <th>Action</th> --}}
                  </tr>
               </thead>
            </table>
         </div>

   </body>
@stop
</html>
