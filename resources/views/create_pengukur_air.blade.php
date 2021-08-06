@extends('adminlte::page')

@section('title', 'Arfa Robot')

@section('content_header')
    <h1 class="m-0 text-dark">Form Alat Pengukur Air</h1>
@stop

@section('plugins.BootstrapSelect', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/create-alat-pengukur" method="POST">
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
                    <x-adminlte-select-bs name="status">
                        <option value="1" selected>Active</option>
                        <option value="0" >Inactive</option>
                    </x-adminlte-select-bs>
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

@push('js')
    <script src="{{ url('myapp/home.js') }}" ></script>
@endpush
