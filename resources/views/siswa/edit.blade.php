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
                    <form method="post" action="{{ route('siswa.update', $siswa->nis) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" class="form-control" required="required" value="{{ $siswa->nis }}" >
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Siswa</label>
                            <input type="text" name="nama" class="form-control" required="required" value="{{ $siswa->nama }}" >
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            {{-- <input type="jeniskelamin" name="jeniskelamin" class="form-control" id="jeniskelamin" value="{{ $siswa->jeniskelamin }}" aria-describedby="jeniskelamin" > --}}
                            <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                                <option value="{{ $siswa->jeniskelamin }}">{{$siswa->jeniskelamin}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" required="required" name="foto" value="{{ $siswa->foto }}" >
                            <img width="100px" src="{{asset('storage/'.$siswa->foto)}}">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            {{-- <input type="kelas" name="kelas" class="form-control" id="kelas" value="{{ $siswa->$kelas->nama_kelas }}" aria-describedby="kelas" > --}}
                            <select name="kelas" id="kelas" class="form-control">
                                @foreach ($kelas as $kls)
                                  <option value="{{$kls->id}}" {{$siswa->kelas_id == $kls->id ? 'selected' : ''}} >{{$kls->nama_kelas}}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required="required" value="{{ $siswa->alamat }}" >
                        </div>
                        <div class="form-group">
                            <label for="walmur">Wali Murid</label>
                            {{-- <input type="walmur" name="walmur" class="form-control" id="walmur" value="{{ $siswa->$walmur->nama_ayah }}" aria-describedby="walmur" > --}}
                            <select name="walmur" id="walmur" class="form-control">
                                <!-- belum selesai walmur -->
                                @foreach ($walmur as $wm)
                                  <option value="{{$wm->id}}" {{$siswa->walmur_id == $wm->id ? 'selected' : ''}} >{{$wm->nama_ayah}}</option>
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
