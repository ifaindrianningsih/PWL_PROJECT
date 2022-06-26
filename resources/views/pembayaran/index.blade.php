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
                  <a class="btn btn-primary" href="{{ route('pembayaran.create')}}"> Tambah Tagihan</a> 
                    <br></br>
                
                    @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                        <p>{{ $message }}</p>
                      </div>
                    @endif
                    <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Semester</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>Tagihan</th>
                                <th>Status</th>
                                <th width="240px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($paginate as $pmb)
                            <tr>
                                <td>{{ $pmb ->id }}</td> 
                                <td>{{ $pmb ->siswa->nama }}</td>
                                <td>{{ $pmb ->semester }}</td>
                                <td>{{ $pmb ->jurusan->nama_jurusan }}</td>
                                <td>{{ $pmb ->kelas->nama_kelas }}</td>
                                <td>{{ $pmb ->tagihan }}</td>
                                <td>{{ $pmb ->status }}</td>
                                <td>
                                <form action="{{ route('pembayaran.destroy',$pmb->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('pembayaran.show',$pmb->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{ route('pembayaran.edit',$pmb->id) }}"><i class="fa fa-edit"></i></a>
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
            <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection