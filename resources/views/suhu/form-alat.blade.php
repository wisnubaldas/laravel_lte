@extends('adminlte::page')

@section('title', 'People Counting Dashboard')

@section('content_header')
<h1>Header</h1>
@stop

@section('plugins.Chartjs', true)
@section('plugins.Datatables', true)

@section('content')
<h1>content</h1>
@stop

@push('js')
<script src="{{ url('myapp/people-counting.js') }}" ></script>

@endpush

@push('css')

@endpush
