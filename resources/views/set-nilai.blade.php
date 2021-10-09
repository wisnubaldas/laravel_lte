@extends('adminlte::page')

@section('title', 'Arfa Robot')

@section('content_header')
    <h1 class="m-0 text-dark">Form Alat Pengukur Air</h1>
@stop

{{-- @section('plugins.BootstrapSelect', true) --}}
@section('plugins.Datatables', true)

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/set-nilai" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="id_alat">Nilai Awal </label>
                    <input type="text" class="form-control form-control-sm" name="nilai_awal" id="id_alat">
                  </div>
                  <div class="form-group">
                    <label for="nama">Batas Air </label>
                    <input type="text" class="form-control form-control-sm" name="batas_air" id="nama">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>

    </div>
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
