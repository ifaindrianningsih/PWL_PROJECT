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
                
          </div><!-- /.col -->
          <div class="card-body"> 

                  <form class="form" method="get" action="{{ route('spp.cari') }}">
                      <div class="form-group w-100 mb-3">
                          <label for="search" class="d-block mr-2">Pencarian Data Transaksi</label>
                          <input type="text" name="cari" class="form-control w-50 d-inline" id="cari" placeholder="Nama">
                          <button type="submit" class="btn btn-success mb-1">Cari</button>
                      </div>
                  </form>

              <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>Tagihan</th>
                                <th>Total Bayar</th>
                                <th>Waktu Transaksi</th>
                                <th>Kwitansi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($paginate as $s)
                            <tr>
                                <td>{{ $s ->siswa->nama }}</td>
                                <td>{{ $s ->jurusan->nama_jurusan }}</td>
                                <td>{{ $s ->kelas->nama_kelas }}</td>
                                <td>{{ $s ->tagihan->tagihan }}</td>
                                <td>{{ $s ->total_bayar }}</td>
                                <td>{{ $s ->tgl_transaksi }}</td>
                                <td>
                                  <!-- <a class="btn btn-secondary" href="{{ route('spp.cetak_pdf',$s->id) }}">Cetak</i></a> -->
                                  <a target="_blank" class="btn btn-danger" href="{{url('kwitansi-spp/cetak_pdf/'.$s->id)}}">Cetak</a>
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