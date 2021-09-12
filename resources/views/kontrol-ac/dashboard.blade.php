@extends('adminlte::page')

@section('title', 'Controler AC Rooms')

@section('content_header')
<div class="row">
    <div class="col-4">
        <x-adminlte-card title="Panel 1" theme="dark" icon="fas fa-solar-panel fas-lg" class="blink-card">
            <div class="row">
                <div class="col-7">
                    <h5><small>ID Panel:</small> P001</h5>
                    <h5><small>AC:</small> R Meeting</h5>
                    <h5><small>Lama Hidup:</small> 10 Hari</h5>

                </div>
                <div class="col-5 text-center">
                    <a href="#" class="btn btn-success btn-lg">
                        <i class="fas fa-power-off fa-4x"></i>
                    </a>
                </div>

            </div>
        </x-adminlte-card>
    </div>
    <div class="col-4">
        <x-adminlte-card title="Panel 2" theme="dark" icon="fas fa-solar-panel fas-lg" class="blink-card">
            <div class="row">
                <div class="col-7">
                    <h5><small>ID Panel:</small> P002</h5>
                    <h5><small>AC:</small> R Meeting</h5>
                    <h5><small>Lama Hidup:</small> 10 Hari</h5>

                </div>
                <div class="col-5 text-center">
                    <a href="#" class="btn btn-danger btn-lg">
                        <i class="fas fa-power-off fa-4x"></i>
                    </a>
                </div>

            </div>
        </x-adminlte-card>
    </div>
    <div class="col-4">
        <x-adminlte-card title="Panel 3" theme="dark" icon="fas fa-solar-panel fas-lg" class="blink-card">
            <div class="row">
                <div class="col-7">
                    <h5><small>ID Panel:</small> P003</h5>
                    <h5><small>AC:</small> R Meeting</h5>
                    <h5><small>Lama Hidup:</small> 10 Hari</h5>

                </div>
                <div class="col-5 text-center">
                    <a href="#" class="btn btn-danger btn-lg">
                        <i class="fas fa-power-off fa-4x"></i>
                    </a>
                </div>

            </div>
        </x-adminlte-card>
    </div>
</div>

@stop

@section('plugins.Chartjs', true)
@section('plugins.Datatables', true)

@section('content')
<x-horizontal-line-chart id="h-line" height='150' width='500' />
@stop

@push('js')
{{-- <script src="{{ url('myapp/people-counting.js') }}" ></script> --}}
<script>
    $(document).ready(function(){
        setInterval(() => {
            $('.fa-solar-panel').toggleClass('text-warning');
        }, 1000);
    })
</script>
@endpush

@push('css')

@endpush
