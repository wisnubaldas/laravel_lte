@extends('adminlte::page')

@section('title', 'Arfa Robot')

@section('content_header')
<div class="row">
    <div class="col-12">
        <h5>
            <small class="text-muted">Kota:</small> <span class="navy" id='kota'></span>&emsp;
            <small class="text-muted">Propinsi:</small> <span id="propinsi"></span>&emsp;
            <small class="text-muted">Kordinat:</small> <span id="kor"></span>&emsp;
            <small class="text-muted">Waktu Update:</small> <span id="time"></span>
        </h5>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
        <span class="info-box-icon bg-olive"><i class="fas fa-cloud-meatball"></i></span>
        <div class="info-box-content" id="hu"></div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
        <span class="info-box-icon bg-danger"><i class="fas fa-temperature-high"></i></span>
        <div class="info-box-content" id="t"></div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
        <span class="info-box-icon bg-success"><i class="fas fa-cloud-sun"></i></span>
        <div class="info-box-content" id="weather"></div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
        <span class="info-box-icon bg-primary"><i class="fas fa-wind"></i></span>
        <div class="info-box-content" id="ws"></div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

</div>

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
                        <th>#</th>
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
                            <td><a class="btn {{($item->status == 1)?'btn-success':'btn-danger'}}" href="#"><i class="fas fa-power-off"></i></a></td>
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
    <script src="{{ url('myapp/localForge.js') }}" ></script>
    <script src="{{ url('myapp/home.js') }}" ></script>

    <script>
        // let target = document.getElementById('foo'); // your canvas element
        // let gauge = new Gauge(target).setOptions(apps.gaugeOptions()); // create sexy gauge!
        //     gauge.maxValue = 100; // set max gauge value;
        //     gauge.set(50); // set actual value
    </script>

    <script>
        // console.log('localforage is: ', localforage);
        /* Realtime line chart ChartJS */
        const jmlAlat = "{{count($alat)}}";
        $(document).ready(function() {
            setInterval(function(){
                // get data BGKG
                apps.ajaxPerDay.run('/api/get-data-bmkg');
                localforage.getItem('data_bmg').then(function(value) {
                    // This code runs once the value has been loaded
                    // from the offline store.
                    const dataBmg = value[0];
                    // console.log(dataBmg);
                    $('#kota').html(dataBmg.kota);
                    $('#propinsi').html(dataBmg.propinsi);
                    $('#kor').html(dataBmg.cor);
                    $('#time').html(dataBmg.waktu);

                    $('#hu').html(`
                        <span class="info-box-text">${dataBmg.cuaca[0].desc}</span>
                        <span class="info-box-number">${dataBmg.cuaca[0].value[0]}</span>
                    `)
                    $('#t').html(`
                        <span class="info-box-text">${dataBmg.cuaca[5].desc}</span>
                        <span class="info-box-number">${dataBmg.cuaca[5].value[0]}, ${dataBmg.cuaca[5].value[1]}</span>
                    `)
                    $('#weather').html(`
                        <span class="info-box-text">${dataBmg.cuaca[6].desc}</span>
                        <span class="info-box-number">${dataBmg.cuaca[6].value[0]}</span>
                    `)
                    $('#ws').html(`
                        <span class="info-box-text">${dataBmg.cuaca[8].desc}</span>
                        <span class="info-box-number">${dataBmg.cuaca[8].value[1]}</span>
                    `)

                }).catch(function(err) {
                    // This code runs if there were any errors
                    console.log(err);
                });
            },3000);

            apps.chartLevelAir(jmlAlat);
            apps.dataTable($('#example'));
        });
    </script>

@endpush
