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
                    <h3 class="card-title">Detail Kelas</h3>
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
                            <li class="list-group-item"><b>Kelas: </b>{{$kelas->nama_kelas}}</li>
                            <li class="list-group-item"><b>Jumlah Siswa: </b>{{$kelas->total_siswa}}</li>
                      </ul>
                      <a class="btn btn-secondary mt-3" href="{{ route('kelas.index') }}">Kembali</a>
                </div>
                <!-- /.card-body -->
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Jurusan</h3>
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
                <div class="float-right my-2">
                    <a class="btn btn-success" href="#"> Tambah Jurusan</a> 
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            <tr>
                                <td>-</td> <!-- belum -->
                                <td>-</td>
                            </tr>
                        </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                    Footer
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-footer-->

        
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection
