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
          <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Detail Transaksi Tabungan</h3>
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
                            <li class="list-group-item"><b>Nama Siswa: </b>{{$tabungan->nama_siswa}}</li>
                            <li class="list-group-item"><b>NIS: </b>{{$tabungan->nis}}</li>
                            <li class="list-group-item"><b>Kelas: </b>{{$tabungan->kelas->nama_kelas}}</li>
                            <li class="list-group-item"><b>Jurusan: </b>{{$tabungan->jurusan->nama_jurusan}}</li>
                            <li class="list-group-item"><b>Nominal: </b>Rp. {{$tabungan->nominal}}</li>
                      </ul>
                      <a class="btn btn-secondary mt-3" href="{{ route('tabungan.index') }}">Kembali</a>
                </div>
                <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.card-footer-->
      </div>
        
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection
