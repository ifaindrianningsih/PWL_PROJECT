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
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" required="required"  value="{{ $pembayaran->nama_siswa }}" >
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input type="text" name="semester" class="form-control" required="required"  value="{{ $pembayaran->semester }}" >
                        </div>
                        <div class="form-group">
                            <label for="tagihan">Tagihan</label>
                            <input type="text" name="tagihan" class="form-control" required="required"  value="{{ $pembayaran->tagihan }}" >
                        </div>
                        <div class="form-group">
                            <label for="terbayar">Terbayar</label>
                            <input type="text" name="terbayar" class="form-control" required="required"  value="{{ $pembayaran->terbayar }}" >
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" name="total" class="form-control" required="required"  value="{{ $pembayaran->total }}" >
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" required="required"  value="{{ $pembayaran->status }}" >
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