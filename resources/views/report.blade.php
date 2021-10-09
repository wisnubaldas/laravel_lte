
@extends('adminlte::page')

@section('title', 'Arfa Robot')

@section('content_header')
    <h1 class="m-0 text-dark">Log Alat Pengukur Air</h1>
@stop

{{-- @section('plugins.BootstrapSelect', true) --}}
@section('plugins.Datatables', true)

@section('content')
    <div class="row">

{{-- Setup data for datatables --}}
@php
$heads = [
    'ID',
    'Nilai',
];

$btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

$config = [
    'order' => [[1, 'asc']],
    'columns' => [null, null],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($log as $row)
        <tr>
            <td>{{$row->pengukur_air_aid}}</td>
            <td>{{$row->nilai}}</td>
        </tr>
    @endforeach
</x-adminlte-datatable>

@stop
@push('css')
<link rel="stylesheet" href="{{url('vendor/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{url('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@push('js')
    <script src="{{url('vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{ url('myapp/home.js') }}" ></script>
    <script>
        let frm = apps.template.form;
        $(document).ready(function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            apps.setNilaiAlat.onSelectAlat($('.select2bs4'),function(a){
                frm.NilaiAlat(a,$('#frm-setnilai'))
            });
        })
    </script>
@endpush
