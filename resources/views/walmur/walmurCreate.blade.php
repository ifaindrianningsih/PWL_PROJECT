@extends('layouts\app')
@section('title')
    Tambah Data Wali Murid
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Tambah Data Wali Murid</h5>
            <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Whoops!</strong>There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
              </div>
            </div>
        </div>
              @endif
              <form method="POST" enctype="multipart/form-data" action="{{route('walmur.store')}}">
                @csrf
                <div class="col-md-12 col-xs-12">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Siswa</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Siswa" name="nama_siswa" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Ayah</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Ayah" name="nama_ayah" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Pekerjaan Ayah" name="pekerjaan_ayah" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Umur Ayah</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Umur Ayah" name="umur_ayah" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Ibu</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Ibu" name="nama_ibu" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pekerjaan Ibu</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Umur Ibu</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Umur Ibu" name="umur_ibu" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat" name="alamat" required>
                          </div>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('walmur.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection