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
            <div class="card">
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
                    <a class="btn btn-success" href="{{ route('kelas.create')}}"> Tambah Kelas</a> 
                    <br></br>

                    @if ($message = Session::get('success'))
                      <div class="alert alert-secondary">
                        <p>{{ $message }}</p>
                      </div>
                    @endif
                    
                    <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Total siswa</th>
                                <th width="240px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($kelas as $kls)
                            <tr>
                                <td>{{ $kls ->id }}</td> 
                                <td>{{ $kls ->nama_kelas }}</td>
                                <td>{{ $kls ->total_siswa }}</td>
                                <td>
                                  <form action="{{ route('kelas.destroy',$kls->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('kelas.show',$kls->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('kelas.edit',$kls->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="paginate">
                      <div class="container">
                        <div class="row">
                            <div class="mx-auto">
                                <div class="paginate-button col-md-12">
                                    {{ $kelas->links() }}
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
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
                            <th  width="240px">Action</th>
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
