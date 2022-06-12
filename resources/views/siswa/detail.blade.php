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
                    <h3 class="card-title">Detail Data Siswa</h3>
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
                            <li class="list-group-item"><b><p align="center"> <img width="100px" src="{{asset('storage/'.$siswa->foto)}}"></li>
                            <li class="list-group-item"><b>NIS: </b>{{$siswa->nis}}</li>
                            <li class="list-group-item"><b>Nama Siswa: </b>{{$siswa->nama}}</li>
                            <li class="list-group-item"><b>Jenis Kelamin: </b>{{$siswa->jeniskelamin}}</li>
                            <li class="list-group-item"><b>Kelas: </b>{{$siswa->kelas->nama_kelas}}</li>
                            <li class="list-group-item"><b>Nama Wali Murid: </b>{{$siswa->walmur->nama_ayah}}</li>
                      </ul>
                      <a class="btn btn-secondary mt-3" href="{{ route('siswa.index') }}">Kembali</a>
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
