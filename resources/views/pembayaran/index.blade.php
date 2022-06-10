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
            <h5 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
                <div class="card-body">
                    <div class="float-right my-2">
                        <a class="btn btn-success" href="{{ route('pembayaran.create')}}"> Tambah Data Tagihan</a> 
                    </div>
            <div class="col-md-2,5"><br><br><br>
                <div class="float-right">
                    <form class="form-inline my-23 my-lg-0" action="{{url()->current()}}" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Nama siswa yang dicari" aria-label="Search" name="keyword" value="{{request('keyword')}}">
                        {{-- <button class="btn btn-icons btn-warning" type="submit"><i class="glyphicon glyphicon-search"></i></button> --}}
                        <button type="submit" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                    </form>
               </div>
           </div>
          </div><!-- /.col -->

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
                                <th>Tagihan</th>
                                <th>Terbayar</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th width="240px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pembayaran as $pmb)
                            <tr>
                                <td>{{ $pmb ->id }}</td> 
                                <td>{{ $pmb ->nama_siswa }}</td>
                                <td>{{ $pmb ->semester }}</td>
                                <td>{{ $pmb ->tagihan }}</td>
                                <td>{{ $pmb ->terbayar }}</td>
                                <td>{{ $pmb ->total }}</td>
                                <td>{{ $pmb ->status }}</td>
                                <td>
                                  <form action="{{ route('pembayaran.destroy',$pmb->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('pembayaran.show',$pmb->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('pembayaran.edit',$pmb->id) }}">Edit</a>
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
                
                <div class="paginate">
                <div class="container">
                    <div class="row">
                        <div class="detail-data col-md-12">
                            <p>Page : {!! $pembayaran->currentPage() !!} <br />
                                Jumlah Data : {!! $pembayaran->total() !!} <br />
                                Data Per Halaman : {!! $pembayaran->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {{ $pembayaran->links() }}
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