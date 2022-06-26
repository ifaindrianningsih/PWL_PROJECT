<!DOCTYPE html>
<html>
    <head>
        <body>
        <div class="row">
            <div class="col-lg-12margin-tb">
                <div class="pull-leftmt-2">
                    <h2 align="center">NOTA TABUNGAN</h2>
                    <h3>SMA NEGERI PLOSO</h3>
                    <p>Jl. Raya Ploso - Babat No.230, Losari Selatan, Losari, Kec. Ploso</p>
                    <p>Kabupaten Jombang, Jawa Timur 61453</p>
                </div>
                <p>_______________________________________________________________________________________</p>
                
                <p>Telah terima dari</p>
                <p>Nama : {{$tab->siswa->nama}}</p>
                <p>Kelas : {{$tab->kelas->nama_kelas}}</p>
                <p></p>
                <p>Keterangan    : <strong>Tabungan Siswa</strong></p>
                <p>Sejumlah uang     : {{$tab->transaksi_akhir}}</p>
                <p>Tanggal transaksi terakhir : {{$tab->updated_at}}</p>
                <p>--------------------------------------------------------------------------------------------------------------------------------------</p>
                
                <p>Jumlah tabungan sebelumnya : {{$jml_sebelumnya}}</p>
                <p>Tabungan akhir : {{$tab->transaksi_akhir}}</p>
                <p>Total akhir : <strong>{{$tab->nominal}}</strong></p>
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