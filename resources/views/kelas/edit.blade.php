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
          <div class="col-md-7">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Kelas</h3>
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
                    <form method="post" action="{{ route('kelas.update', $kelas->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" required="required"  value="{{ $kelas->nama_kelas }}" >
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            {{-- <input type="jurusan" name="jurusan" class="form-control" id="jurusan"  value="{{ $kelas->$jurusan->nama_jurusan }}" aria-describedby="jurusan" > --}}
                            <select name="jurusan" id="jurusan" class="form-control">
                                @foreach ($jurusan as $jr)
                                  <option value="{{$jr->id}}" {{$kelas->jurusan_id == $jr->id ? 'selected' : ''}} >{{$jr->nama_jurusan}}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="total_siswa">Total Siswa</label>
                            <input type="text" name="total_siswa" class="form-control" required="required"  value="{{ $kelas->total_siswa }}" >
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

          <div class="col-md-5">
            <div class="card card-secondary">
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jurusan</th>
                            <th>Total Kelas</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach ($jurusan as $jur)
                            <tr>
                                <td>{{ $jur ->id }}</td> <!-- belum -->
                                <td>{{ $jur ->nama_jurusan }}</td>
                                <td>{{ $jur ->total_kelas }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                    
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-footer-->

        
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection
