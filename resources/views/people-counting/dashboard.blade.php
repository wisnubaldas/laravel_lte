@extends('adminlte::page')

@section('title', 'People Counting Dashboard')

@section('content_header')
<div class="row">
    <div class="col-md-3">
        <x-adminlte-small-box title="0" text="Populasi" icon="fas fa-people-arrows"
        theme="lightblue" id="sbUpdatable"/>
    </div>
    <div class="col-md-3">
        <x-adminlte-small-box title="100" text="Keluar Ruang" icon="fas fa-people-arrows"
        theme="indigo" id="sbUpdatable2"/>
    </div>
    <div class="col-3">
        <x-adminlte-small-box title="30" text="Masuk Ruang" icon="fas fa-people-arrows"
        theme="fuchsia" id="sbUpdatable3"/>
    </div>
    <div class="col-3">
        <x-adminlte-small-box title="1000" text="Populasi" icon="fas fa-people-arrows"
        theme="purple" id="sbUpdatable4"/>


    </div>
</div>

@stop

@section('plugins.Chartjs', true)
@section('plugins.Datatables', true)

@section('content')
<div class="row">
    <div class="col-md-12">
        <x-live-chart id="crot" width="400" height="150"/>
    </div>
</div>

@stop

@push('js')
<script src="{{ url('myapp/people-counting.js') }}" ></script>
<script>

    $(document).ready(function(){
        peopleCounting.liveChart.init();

        // ##### Small Box ###### //
        let startUpdateProcedure = () =>
        {
            let rep = Math.floor(1000 * Math.random());
            let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
            let text = 'Pengunjung ' + ['Kurang', 'Cukup', 'Berlebih'][idx];
            let icon = 'fas fa-people-arrows ' + ['text-success', 'text-warning', 'text-danger'][idx];
            // peopleCounting.smallBox.init('sbUpdatable',{
            //         rep:rep,
            //         idx:idx,
            //         text:text,
            //         icon:icon,
            //         title:rep
            // });
            peopleCounting.smallBox.init('sbUpdatable',{
                    rep:rep,
                    idx:idx,
                    text:text,
                    icon:icon,
                    title:rep,
            });
            // Simulate loading procedure.
            peopleCounting.smallBox.sBox.toggleLoading();
            // Wait and update the data.
            setTimeout(peopleCounting.smallBox.init, 1000);
        };

        setInterval(startUpdateProcedure, 5000);

        // chart js

    })
</script>
@endpush

@push('css')

@endpush
