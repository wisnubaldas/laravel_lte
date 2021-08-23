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
              <form role="form" action="/create-alat-pengukur" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="id_alat">ID Alat </label>
                    <input type="text" class="form-control form-control-sm" name="id_alat" id="id_alat">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Alat </label>
                    <input type="text" class="form-control form-control-sm" name="nama" id="nama">
                  </div>
                  <div class="form-group">
                    <label for="posisi">Posisi Alat </label>
                    <input type="text" class="form-control form-control-sm" name="posisi" id="posisi">
                  </div>
                  <div class="form-group">
                    <label for="warna_label">Warna Label </label>
                    <input type="text" class="form-control form-control-sm" name="warna_label" id="warna_label">
                  </div>
                  <div class="form-group">
                    <label for="warna_label">Status Alat </label>
                    <select class="select2bs4" name="status" autocomplete="off" style="width: 100%">
                        <option value="1" selected>Active</option>
                        <option value="0" >Inactive</option>
                      </select>
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
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="warna_label">Set Nilai Batas Atas Air & Nilai Batas Alaram  </label>
                        <select class="select2bs4" name="alat" id="alat-pengukur" autocomplete="off" style="width: 100%">
                          <option selected > ### Pilih Alat ###</option>
                            @foreach ($alat as $item)
                                <option value="{{$item->id}}" >{{$item->id_alat}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="card-body" id="frm-setnilai">
                    <form action="/nilai-air" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
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
