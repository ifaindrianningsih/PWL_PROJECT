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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kelola Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
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
                  <a class="btn btn-primary" href="{{ route('siswa.create')}}"> Tambah Siswa</a> 
                    <br></br>

                    @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                        <p>{{ $message }}</p>
                      </div>
                    @endif 

                  <form class="form" method="get" action="{{ route('siswa.cari') }}">
                      <div class="form-group w-100 mb-3">
                          <label for="search" class="d-block mr-2">Pencarian Data Siswa</label>
                          <input type="text" name="cari" class="form-control w-50 d-inline" id="cari" placeholder="NIS/Nama">
                          <button type="submit" class="btn btn-success mb-1">Cari</button>
                      </div>
                  </form>

              <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Wali Murid</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($paginate as $siswa)
                            <tr>
                                <td><img width="100px" height="100px" src="{{asset('storage/'.$siswa->foto)}}"></td>
                                <td>{{ $siswa ->nis }}</td> 
                                <td>{{ $siswa ->nama }}</td>
                                <td>{{ $siswa ->jeniskelamin }}</td>
                                <td>{{ $siswa ->kelas->nama_kelas }}</td>
                                <td>{{ $siswa ->alamat }}</td>
                                <td>{{ $siswa ->walmur->nama_ayah}}</td>
                                <td>
                                  <form action="{{ route('siswa.destroy',$siswa->nis) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('siswa.show',$siswa->nis) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{ route('siswa.edit',$siswa->nis) }}"><i class="fa fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
                                    {{ $paginate->links() }}
                                </div>
                            </div>
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
