@extends('layouts\app')
@section('title')
    Detail Data Wali Murid
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Wali Murid</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" readonly value="{{$walmur->nama_siswa}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{$walmur->nama_ayah}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" readonly value="{{$walmur->pekerjaan_ayah}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Umur Ayah</label>
                            <input type="text" class="form-control" id="umur_ayah" name="umur_ayah" readonly value="{{$walmur->umur_ayah}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" readonly value="{{$walmur->nama_ibu}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pekerjaan Ibu</label>
                            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" readonly value="{{$walmur->pekerjaan_ibu}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Umur Ibu</label>
                            <input type="text" class="form-control" id="umur_ibu" name="umur_ibu" readonly value="{{$walmur->umur_ibu}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" readonly value="{{$walmur->alamat}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('walmur.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection