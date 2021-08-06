@extends('adminlte::page')

@section('title', 'Arfa Robot')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard Monitoring Level Air</h1>
@stop

@section('plugins.Chartjs', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <canvas id="myChart" width="400" height="100"></canvas>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                        @foreach ($alat as $item)
                            <div class="info-box">
                                <span class="info-box-icon {{($item->status == 1)?'bg-success':'bg-danger'}} elevation-1">
                                    <i class="fas fa-power-off"></i>
                                </span>
                                <div class="info-box-content">
                                <span class="info-box-text">Sensor {{$item->id_alat}}</span>

                                <span class="info-box-text">{{($item->status == 1)?'Sensor Keadaan Active':'Sensor Keadaan Mati'}}</span>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="col-8">
            <h5>Last Value Table</h5>
                <table id="example" class="display table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Name Sensor</th>
                        <th>Position</th>
                        <th>Date Live</th>
                        <th>Last Value</th>
                        <th>Status Power</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alat as $item)
                        <tr>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->posisi}}</td>
                            <td>{{$item->waktu}}</td>
                            <td>{{$item->nilai}}</td>
                            <td>{{($item->status == 1)?'ON':'OFF'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@push('js')
    <script src="{{ url('vendor/gauge/gauge.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon@1.27.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@2.0.0"></script>
    <script src="{{ url('myapp/home.js') }}" ></script>

    <script>
        // let target = document.getElementById('foo'); // your canvas element
        // let gauge = new Gauge(target).setOptions(apps.gaugeOptions()); // create sexy gauge!
        //     gauge.maxValue = 100; // set max gauge value;
        //     gauge.set(50); // set actual value
    </script>

    <script>
        /* Realtime line chart ChartJS */
        // console.log(alat);
        const jmlAlat = "{{count($alat)}}";
        $(document).ready(function() {
            // setInterval(function(){
            //     load_notification();
            // }, 5000);

            apps.chartLevelAir(jmlAlat);
            apps.dataTable($('#example'));
        });
    </script>

@endpush
