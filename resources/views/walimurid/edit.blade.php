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
                    <h3 class="card-title">Edit Data Wali Murid</h3>
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
                    <form method="post" action="{{ route('walimurid.update', $walimurid->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" required="required"  value="{{ $walimurid->nama_siswa }}" >
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control" required="required"  value="{{ $walimurid->nama_ayah }}" >
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control" required="required"  value="{{ $walimurid->pekerjaan_ayah }}" >
                        </div>
                        <div class="form-group">
                            <label for="umur_ayah">Umur Ayah</label>
                            <input type="text" name="umur_ayah" class="form-control" required="required"  value="{{ $walimurid->umur_ayah }}" >
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control" required="required"  value="{{ $walimurid->nama_ibu }}" >
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control" required="required"  value="{{ $walimurid->pekerjaan_ibu }}" >
                        </div>
                        <div class="form-group">
                            <label for="umur_ibu">Umur Ibu</label>
                            <input type="text" name="umur_ibu" class="form-control" required="required"  value="{{ $walimurid->umur_ibu }}" >
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required="required"  value="{{ $walimurid->alamat }}" >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.card-body -->
                
            </div>
          </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection