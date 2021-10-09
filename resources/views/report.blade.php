
@extends('adminlte::page')

@section('title', 'Arfa Robot')

@section('content_header')
    <h1 class="m-0 text-dark">Log Alat Pengukur Air</h1>
@stop

{{-- @section('plugins.BootstrapSelect', true) --}}
@section('plugins.Datatables', true)

@section('content')
    <div class="row">

        <table class="table table-bordered" id="users-table">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>ID</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
@stop
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush
@push('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('myapp/home.js') }}" ></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/report'
            });
        });
    </script>
@endpush
