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


          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengguna</h3>
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
              @if ($message = Session::get('success'))
                      <div class="alert alert-secondary">
                        <p>{{ $message }}</p>
                      </div>
                    @endif
              <form class="form" method="get" action="{{ route('pengguna.cari') }}">
                      <div class="form-group w-100 mb-3">
                          <label for="search" class="d-block mr-2">Pencarian Data Pengguna</label>
                          <input type="text" name="cari" class="form-control w-50 d-inline" id="cari" placeholder="Nama Pengguna">
                          <button type="submit" class="btn btn-success mb-1">Cari</button>
                      </div>
                    </form>
              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Jabatan</th>
                            <th>Username</th>
                            <th width="140px">Action</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach ($pengguna as $pg)
                            <tr>
                                <td>{{ $pg ->id }}</td> 
                                <td>{{ $pg ->nama_pengguna }}</td>
                                <td>{{ $pg ->jabatan }}</td>
                                <td>{{ $pg ->username }}</td>
                                <td>
                                <form action="{{ route('pengguna.destroy',$pg->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('pengguna.show',$pg->id) }}"><i class="fa fa-eye"></i></a>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>

                <div class="paginate">
                <div class="container">
                    <div class="row">
                        <div class="detail-data col-md-12">
                            <p>Page : {!! $pengguna->currentPage() !!} <br />
                                Jumlah Data : {!! $pengguna->total() !!} <br />
                                Data Per Halaman : {!! $pengguna->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {{ $pengguna->links() }}
                            </div>
                        </div>
                    </div>
                </div>
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
