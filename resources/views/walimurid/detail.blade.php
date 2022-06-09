@extends('layouts.master')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Kelola Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Detail Wali Murid</h3>
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                      <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Nama Siswa     : </b>{{$walimurid->nama_siswa}}</li>
                            <li class="list-group-item"><b>Nama Ayah      : </b>{{$walimurid->nama_ayah}}</li>
                            <li class="list-group-item"><b>Pekerjaan Ayah : </b>{{$walimurid->pekerjaan_ayah}}</li>
                            <li class="list-group-item"><b>Umur Ayah      : </b>{{$walimurid->umur_ayah}} <t> tahun</t></li>
                            <li class="list-group-item"><b>Nama Ibu       : </b>{{$walimurid->nama_ibu}}</li>
                            <li class="list-group-item"><b>Pekerjaan Ibu  : </b>{{$walimurid->pekerjaan_ibu}}</li>
                            <li class="list-group-item"><b>Umur Ibu       : </b>{{$walimurid->umur_ibu}} <t> tahun</t></li>
                            <li class="list-group-item"><b>Alamat         : </b>{{$walimurid->alamat}}</li>
                      </ul>
                      <a class="btn btn-secondary mt-3" href="{{ route('walimurid.index') }}">Kembali</a>
                </div>
                <!-- /.card-body -->
            </div>
          </div>
            </div>
          </div>
        </div>
        <!-- /.card-footer-->

        
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection