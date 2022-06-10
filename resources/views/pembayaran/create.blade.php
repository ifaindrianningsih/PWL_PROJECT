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
                    <form method="post" action="{{ route('pembayaran.store') }}" id="myForm">
                    @csrf   
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" aria-describedby="nama_siswa" >
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input type="text" name="semester" class="form-control" id="semester" aria-describedby="semester" >
                        </div>
                        <div class="form-group">
                            <label for="tagihan">Tagihan</label>
                            <input type="text" name="tagihan" class="form-control" id="tagihan" aria-describedby="tagihan" >
                        </div>
                        <div class="form-group">
                            <label for="terbayar">Terbayar</label>
                            <input type="text" name="terbayar" class="form-control" id="terbayar" aria-describedby="terbayar" >
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" name="total" class="form-control" id="total" aria-describedby="total" >
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" id="status" aria-describedby="status" >
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