@extends('adminlte::page')

@section('title', 'Arfa Robot | Dashboard')

@section('content_header')
<div class="text-center col-12">
    <img src="http://iap-sumut.org/media/blog/1612595687.jpg" style="opacity: 0.5;" alt="..." width="100%">
    <div class="caption">
        <p>IOT Project's </p>
    </div>
</div>
@stop

@section('plugins.Chartjs', true)
@section('plugins.Datatables', true)

@section('content')

@stop

@push('js')

@endpush

@push('css')
<style>
.caption {
    position: absolute;
    top: 45%;
    left: 0;
    padding: 0;
    margin: 0;
    width: 100%;
    text-shadow: 2px 2px 5px rgb(247, 247, 248);
    font-size: 60px;
}
</style>
@endpush
