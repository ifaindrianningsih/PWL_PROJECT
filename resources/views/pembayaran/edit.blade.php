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
                    <h3 class="card-title">Edit Data Tagihan</h3>
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
                    <form method="post" action="{{ route('pembayaran.update', $pembayaran->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="siswa">Nama Siswa</label>
                            {{-- <input type="siswa" name="siswa" class="form-control" id="siswa" value="{{ $pembayaran->siswa }}" aria-describedby="siswa" > --}}
                            <select name="siswa" id="siswa" class="form-control">
                                @foreach ($siswa as $s)
                                  <option value="{{$s->id_siswa}}" {{$pembayaran->siswa == $s->id ? 'selected' : ''}} >{{$s->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input type="text" name="semester" class="form-control" required="required"  value="{{ $pembayaran->semester }}" >
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            {{-- <input type="jurusan" name="jurusan" class="form-control" id="jurusan" value="{{ $pembayaran->$jurusan->nama_jurusan }}" aria-describedby="jurusan" > --}}
                            <select name="jurusan" id="jurusan" class="form-control">
                                @foreach ($jurusan as $jrs)
                                  <option value="{{$jrs->id}}" {{$pembayaran->jurusan_id == $jrs->id ? 'selected' : ''}} >{{$jrs->nama_jurusan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            {{-- <input type="kelas" name="kelas" class="form-control" id="kelas" value="{{ $pembayaran->$kelas->nama_kelas }}" aria-describedby="kelas" > --}}
                            <select name="kelas" id="kelas" class="form-control">
                                @foreach ($kelas as $kls)
                                  <option value="{{$kls->id}}" {{$pembayaran->kelas_id == $kls->id ? 'selected' : ''}} >{{$kls->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tagihan">Tagihan</label>
                            <input type="text" name="tagihan" class="form-control" required="required"  value="{{ $pembayaran->tagihan }}" >
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            {{-- <input type="status" name="status" class="form-control" id="status" value="{{ $pembayaran->status }}" aria-describedby="jeniskelamin" > --}}
                            <select name="status" id="status" class="form-control">
                                <option value="Belum Lunas">Belum Lunas</option>
                                <option value="Lunas">Lunas</option>
                            </select>
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