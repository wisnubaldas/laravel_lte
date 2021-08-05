@extends('adminlte::page')

@section('title', 'Arfa Robot')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard Monitoring Level Air</h1>
@stop

@section('plugins.Chartjs', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                        <canvas id="myChart" width="400" height="100"></canvas>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <canvas id="foo"></canvas>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1">
                            <i class="fas fa-power-off"></i>
                        </span>
                        <div class="info-box-content">
                          <span class="info-box-text">Sensor 2</span>
                          <span class="info-box-text">Turn Off</span>
                        </div>
                      </div>
                      <!-- /.info-box-content -->
                      <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1">
                            <i class="fas fa-power-off"></i>
                        </span>
                        <div class="info-box-content">
                          <span class="info-box-text">Sensor 3</span>
                          <span class="info-box-text">Turn On</span>
                        </div>
                      </div>
                      <!-- /.info-box-content -->
                      <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1">
                            <i class="fas fa-power-off"></i>
                        </span>
                        <div class="info-box-content">
                          <span class="info-box-text">Sensor 4</span>
                          <span class="info-box-text">Turn On</span>
                        </div>
                      </div>
                      <!-- /.info-box-content -->
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
                    <tr>
                        <td>SN0199</td>
                        <td>Bayah</td>
                        <td>2011/04/25</td>
                        <td>61</td>
                        <td>ON</td>
                    </tr>
                    <tr>
                        <td>SN07309</td>
                        <td>Tangerang</td>
                        <td>2011/04/25</td>
                        <td>90</td>
                        <td>OFF</td>
                    </tr>
                    <tr>
                        <td>SN09087</td>
                        <td>Surabaya</td>
                        <td>2011/04/25</td>
                        <td>900</td>
                        <td>OFF</td>
                    </tr>
                    <tr>
                        <td>SN03309</td>
                        <td>Makasar</td>
                        <td>2011/04/25</td>
                        <td>61</td>
                        <td>OFF</td>
                    </tr>
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
        let target = document.getElementById('foo'); // your canvas element
        let gauge = new Gauge(target).setOptions(apps.gaugeOptions()); // create sexy gauge!
            gauge.maxValue = 100; // set max gauge value;
            gauge.set(50); // set actual value
    </script>

    <script>
        /* Realtime line chart ChartJS */
        $(document).ready(function() {
            apps.chartLevelAir();
            apps.dataTable($('#example'));
        });
    </script>

@endpush
