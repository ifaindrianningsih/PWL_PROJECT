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
                    <form method="post" action="{{ route('siswa.store') }}" id="myForm">
                    @csrf
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" class="form-control" id="nis" aria-describedby="nis" >
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Siswa</label>
                            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" >
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control" id="foto" aria-describedby="foto" >
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control">
                              @foreach ($kelas as $kls)
                                <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" >
                        </div>
                        <div class="form-group">
                            <label for="walmur">Wali Murid</label>
                            <select name="walmur" id="walmur" class="form-control">
                                <!-- belum selesai walmur -->
                                @foreach ($walmur as $wm)
                                <option value="{{$wm->id}}">{{$wm->nama_ayah}}</option>
                              @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
        <!-- /.card-footer-->
      </div>
        
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection
