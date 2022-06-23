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
                    <form  method="post" action="{{ route('spp.store') }}" id="myForm">
                    @csrf
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <select name="nama_siswa" id="nama_siswa" class="form-control">
                              @foreach ($siswa as $sw)
                                <option value="{{$sw->id_siswa}}">{{$sw->nama}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control">
                              @foreach ($jurusan as $jrs)
                                <option value="{{$jrs->id}}">{{$jrs->nama_jurusan}}</option>
                              @endforeach
                            </select>
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
                            <label for="tagihan">Tagihan</label>
                            <select name="tagihan" id="tagihan" class="form-control">
                              @foreach ($tagihan as $th)
                                <option value="{{$th->id}}">{{$th->nama_siswa}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Total Bayar</label>
                            <input type="number" name="total_bayar" class="form-control" id="total_bayar" aria-describedby="total_bayar" >
                        </div>
                        <div class="form-group">
                            <label for="tgl_transaksi">Waktu Transaksi</label>
                            <input type="date" name="tgl_transaksi" class="form-control" id="tgl_transaksi" aria-describedby="tgl_transaksi" >
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
