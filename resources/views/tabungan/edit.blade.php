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
                    <form method="post" action="{{ route('tabungan.update', $tabungan->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                
                        <div class="form-group">
                            <label for="siswa">Nama Siswa</label>
                            {{-- <input type="siswa" name="siswa" class="form-control" id="siswa" value="{{ $tabungan->siswa }}" aria-describedby="siswa" > --}}
                            <select name="siswa" id="siswa" class="form-control">
                                @foreach ($siswa as $s)
                                  <option value="{{$s->id_siswa}}" {{$tabungan->siswa_id == $s->id ? 'selected' : ''}} >{{$s->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                          <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            {{-- <input type="jurusan" name="jurusan" class="form-control" id="jurusan"  value="{{ $tabungan->$jurusan->nama_jurusan }}" aria-describedby="jurusan" > --}}
                            <select name="jurusan" id="jurusan" class="form-control">
                                @foreach ($jurusan as $jr)
                                  <option value="{{$jr->id}}" {{$tabungan->jurusan_id == $jr->id ? 'selected' : ''}} >{{$jr->nama_jurusan}}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            {{-- <input type="kelas" name="kelas" class="form-control" id="kelas" value="{{ $tabungan->$kelas->nama_kelas }}" aria-describedby="kelas" > --}}
                            <select name="kelas" id="kelas" class="form-control">
                                @foreach ($kelas as $kls)
                                  <option value="{{$kls->id}}" {{$tabungan->kelas_id == $kls->id ? 'selected' : ''}} >{{$kls->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="transaksi_akhir">Jumlah Menabung</label>
                            <input type="double" name="transaksi_akhir" class="form-control" id="transaksi_akhir" aria-describedby="transaksi_akhir" >
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
