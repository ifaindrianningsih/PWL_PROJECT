@extends('layouts.master')
@section('title')
    Data Wali Murid
@endsection
@section('content')
<div class="row">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="pull-right mt-2">
        <div class="row mb-1">
          <div class="col-sm-2">
            <h1 class="m-0">Data Wali Murid</h1><br>
            <h3> <a class="btn btn-success" href="{{route('walmur.create')}}">+ Tambah Data</a></h3>
          </div><!-- /.col -->
            <div class="col-md-6"><br><br><br>
                <div class="float-right">
                    <form class="form-inline my-23 my-lg-0" action="{{url()->current()}}" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="{{request('keyword')}}">
                        {{-- <button class="btn btn-icons btn-warning" type="submit"><i class="glyphicon glyphicon-search"></i></button> --}}
                        <button type="submit" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                    </form>
               </div>
           </div>
          </div><!-- /.col -->
    </div>
            <div class="alert-option">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                @endif

                </div>
            </div>

            <div class="table table-bordered">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Nama Ayah</th>
                            <th scope="col">Pekerjaan Ayah</th>
                            <th scope="col">Umur Ayah</th>
                            <th scope="col">Nama Ibu</th>
                            <th scope="col">Pekerjaan Ibu</th>
                            <th scope="col">Umur Ibu</th>
                            <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($walmur as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama_siswa}}</td>
                        <td>{{$data->nama_ayah}}</td>
                        <td>{{$data->pekerjaan_ayah}}</td>
                        <td>{{$data->umur_ayah}}</td>
                        <td>{{$data->nama_ibu}}</td>
                        <td>{{$data->pekerjaan_ibu}}</td>
                        <td>{{$data->umur_ibu}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>
                            <form action="{{ route('walmur.destroy',  $data->id) }}" method="POST">
                                <a class="btn btn-icons btn-primary" href="{{route('walmur.show', $data->id)}}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-icons btn-warning" href="{{route('walmur.edit', $data->id)}}"><i class="fa fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-icons btn-danger"><i class="fa fa-trash"></i></button>
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
                            <p>Page : {!! $walmur->currentPage() !!} <br />
                                Jumlah Data : {!! $walmur->total() !!} <br />
                                Data Per Halaman : {!! $walmur->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {{ $walmur->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#walmur').addClass('active');
    </script>
@endsection