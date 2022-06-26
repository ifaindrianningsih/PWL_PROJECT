<!DOCTYPE html>
<html>
    <head>
        <body>
        <div class="row">
            <div class="col-lg-12margin-tb">
                <div class="pull-leftmt-2">
                    <h2 align="center">KWITANSI</h2>
                    <h3>SMA NEGERI PLOSO</h3>
                    <p>Jl. Raya Ploso - Babat No.230, Losari Selatan, Losari, Kec. Ploso</p>
                    <p>Kabupaten Jombang, Jawa Timur 61453</p>
                </div>
                <p>_______________________________________________________________________________________</p>
                
                <p>Telah terima dari</p>
                <p>Nama : {{$spp->siswa->nama}}</p>
                <p>Kelas : {{$spp->kelas->nama_kelas}}</p>
                <p></p>
                <p>Keterangan    : <strong>Pembayaran SPP</strong></p>
                <p>Sejumlah uang     : {{$spp->total_bayar}}</p>
                <p>Tanggal transaksi : {{$spp->tgl_transaksi}}</p>
                <p>--------------------------------------------------------------------------------------------------------------------------------------</p>
                
                <p>Tagihan : {{$spp->tagihan->tagihan}}</p>
                <p>Terbayar : {{$spp->total_bayar}}</p>
                <p>Sisa Tagihan : <strong>{{$sisa}}</strong></p>
                <p>Status : {{$status}}</p>
                <p>_______________________________________________________________________________________</p>
                <p align="right">Ploso, {{$tgl}}</p>
                <p></p>
                <p></p>
                <p></p>
                <p align="right">Tata Usaha</p>
                </div>
            </div>
        </body>
    </head>
</html>