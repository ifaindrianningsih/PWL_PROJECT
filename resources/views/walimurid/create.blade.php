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
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
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
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ route('walimurid.store') }}" id="myForm">
                    @csrf   
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" aria-describedby="nama_siswa" >
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" aria-describedby="nama_ayah" >
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah" aria-describedby="pekerjaan_ayah" >
                        </div>
                        <div class="form-group">
                            <label for="umur_ayah">Umur Ayah</label>
                            <input type="text" name="umur_ayah" class="form-control" id="umur_ayah" aria-describedby="umur_ayah" >
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" aria-describedby="nama_ibu" >
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ibu" aria-describedby="pekerjaan_ibu" >
                        </div>
                        <div class="form-group">
                            <label for="umur_ibu">Umur Ibu</label>
                            <input type="text" name="umur_ibu" class="form-control" id="umur_ibu" aria-describedby="umur_ibu" >
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
            </div>
          </div>
        
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection