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
                        <a class="btn btn-success" href="{{ route('walimurid.create')}}"> Tambah Data</a> 
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
                                <th>Nama Ayah</th>
                                <th>Pekerjaan Ayah</th>
                                <th>Umur Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Pekerjaan Ibu</th>
                                <th>Umur Ibu</th>
                                <th>Alamat</th>
                                <th width="240px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($walimurid as $wm)
                            <tr>
                                <td>{{ $wm ->id }}</td> 
                                <td>{{ $wm ->nama_siswa }}</td>
                                <td>{{ $wm ->nama_ayah }}</td>
                                <td>{{ $wm ->pekerjaan_ayah }}</td>
                                <td>{{ $wm ->umur_ayah }}</td>
                                <td>{{ $wm ->nama_ibu }}</td>
                                <td>{{ $wm ->pekerjaan_ibu }}</td>
                                <td>{{ $wm ->umur_ibu }}</td>
                                <td>{{ $wm ->alamat }}</td>
                                <td>
                                  <form action="{{ route('walimurid.destroy',$wm->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('walimurid.show',$wm->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{ route('walimurid.edit',$wm->id) }}"><i class="fa fa-edit"></i></a>
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
                        <div class="detail-data col-md-12">
                            <p>Page : {!! $walimurid->currentPage() !!} <br />
                                Jumlah Data : {!! $walimurid->total() !!} <br />
                                Data Per Halaman : {!! $walimurid->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {{ $walimurid->links() }}
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