@extends('adminlte::page')

@section('title', 'People Counting Dashboard')

@section('content_header')
<div class="row">
    <div class="col-lg-3 ">
        <div class="info-box">
            <div class="info-box-content m-1 p-1">
                <x-knob label="Sensor Suhu 1" id="knb1"/>
            </div>
          </div>
    </div>
    <div class="col-lg-3 ">
        <div class="info-box">
            <div class="info-box-content m-1 p-1">
                <x-knob label="Sensor Suhu 2" id="knb2"/>
            </div>
          </div>
    </div>
    <div class="col-lg-3 ">
        <div class="info-box">
            <div class="info-box-content m-1 p-1">
                <x-knob label="Sensor Suhu 3" id="knb3"/>
            </div>
          </div>
    </div>
    <div class="col-lg-3 ">
        <div class="info-box">
            <div class="info-box-content m-1 p-1">
                <x-knob label="Sensor Suhu 4" id="knb4"/>
            </div>
          </div>
    </div>
</div>

@stop

@section('plugins.Chartjs', true)
@section('plugins.Datatables', true)
@section('plugins.jqueryKnob', true)

@section('content')
<div class="row">
    <div class="col-md-12">
        <x-live-chart id="crot" width="400" height="150"/>
    </div>
</div>

@stop

@push('js')
<script src="{{ url('myapp/monitor-suhu.js') }}" ></script>
<script>
    // random number untuk data sample
    // bisa ganti pake ajax
    let randomNumber = function(){
        return Math.floor(100 * Math.random());
    }
    $(document).ready(function(){

        // sample knob
        let knobSample = (id,callback) => {
            monitorSuhu.knob.init(id,{
                readOnly:true,
                    'format' : function (value) {
                        return value + '\xB0'+'C';
                    }
            });
            return callback()
        }

        let knoppi = () => {
                knobSample('knb1',function(){
                    monitorSuhu.knob.updateData(randomNumber())
                })
                knobSample('knb2',function(){
                    monitorSuhu.knob.updateData(randomNumber())
                })
                knobSample('knb3',function(){
                    monitorSuhu.knob.updateData(randomNumber())
                })
                knobSample('knb4',function(){
                    monitorSuhu.knob.updateData(randomNumber())
                })
            }

        setInterval(knoppi, 5000);

        monitorSuhu.liveChart.init();
        // monitorSuhu.liveChart.addData('Sensor 4',30);
        // monitorSuhu.liveChart.updateData([1,2,3,4]);

        let sampleData = () =>
        {
            monitorSuhu.liveChart.updateData([
                randomNumber(),
                randomNumber(),
                randomNumber(),
                randomNumber(),
                randomNumber(),
            ],{
                scales:{
                    y:{
                        type: 'linear',
                        min: 0,
                        max: 100
                    }
                }
            });
            // monitorSuhu.liveChart.removeData();
            // monitorSuhu.liveChart.addData('Sensor-'+randomNumber(),randomNumber());

        }

        setInterval(sampleData, 5000);

    })
</script>
@endpush

@push('css')

@endpush
