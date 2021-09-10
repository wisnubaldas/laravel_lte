@extends('adminlte::page')

@section('title', 'People Counting Dashboard')

@section('content_header')
<div class="row">
    <h1>suhu</h1>
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
<script src="{{ url('myapp/monitor-suhu.js') }}" ></script>
<script>

    $(document).ready(function(){
        monitorSuhu.liveChart.init();
        monitorSuhu.liveChart.addData();
        // function updateBox(){
        //     let rep = Math.floor(200 * Math.random());
        //     const batas = (rep > 100)?'Batas orang berlebihan':'Batas orang Normal';
        //     peopleCounting.card.el = 'pTotal';
        //     peopleCounting.card.init({
        //         theme:'danger',
        //         text:rep+' Orang/100 kapasitas',
        //         icon:'fas fa-lg fa-people-arrows text-teal',
        //         description:batas,
        //         progress:Math.round(rep * 100 / 100)
        //     });
        // }
        // setInterval(updateBox, 5000);

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
            // peopleCounting.smallBox.init('sbUpdatable',{
            //         rep:rep,
            //         idx:idx,
            //         text:text,
            //         icon:icon,
            //         title:rep,
            // });
            // Simulate loading procedure.
            // peopleCounting.smallBox.sBox.toggleLoading();
            // Wait and update the data.
            // setTimeout(peopleCounting.smallBox.init, 1000);
        };

        setInterval(startUpdateProcedure, 5000);

        // chart js

    })
</script>
@endpush

@push('css')

@endpush
