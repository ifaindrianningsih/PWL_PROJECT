<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tabungan;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Siswa;
use Dompdf\Adapter\PDFLib;
use PDF;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabungan = Tabungan::all(); 
        $siswa = DB::table('siswa')->get();
        $kelas = DB::table('kelas')->get();
        $jurusan = DB::table('jurusan')->get();
        $title = 'Transaksi Tabungan';
        $paginate = Tabungan::orderBy('id', 'asc')->paginate(3);
        return view('tabungan.index', compact('tabungan','siswa','kelas','jurusan', 'title','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Transaksi Tabungan';
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('tabungan.create', compact('title','siswa','kelas','jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            // 'nominal' => 'required',
            'transaksi_akhir' => 'required',
        ]);

        $tabungan = new Tabungan;
        $tabungan->transaksi_akhir = $request->get('transaksi_akhir');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');
        $jurusan = new Jurusan;
        $jurusan->id = $request->get('jurusan');
        $siswa = new Siswa;
        $siswa->id_siswa = $request->get('siswa');

        $tabungan->nominal += $tabungan->transaksi_akhir;

        $tabungan->kelas()->associate($kelas);
        $tabungan->jurusan()->associate($jurusan);
        $tabungan->siswa()->associate($siswa);
        $tabungan->save();
        
        return redirect()->route('tabungan.index')
        ->with('success', 'Data Tabungan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tabungan = Tabungan::all()->where('id',$id)->first();
        $siswa = DB::table('siswa')->get();
        $kelas = DB::table('kelas')->get();
        $jurusan = DB::table('jurusan')->get();
        $title = 'Data Tabungan';
        return view('tabungan.detail', compact('tabungan', 'siswa', 'kelas', 'jurusan', 'title'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabungan = Tabungan::all()->where('id', $id)->first();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $kls = $kelas = DB::table('kelas')->get();
        $jrs = $jrs = DB::table('jurusan')->get();
        $sw = DB::table('siswa')->get();
        $title = 'Data Tabungan';
        return view('tabungan.edit', compact('tabungan','siswa','kelas','jurusan','jrs','kls','sw','title'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            // 'nominal' => 'required',
            'transaksi_akhir' => 'required',
        ]);
        
        $tabungan = Tabungan::all()->where('id',$id)->first();
        $tabungan->transaksi_akhir = $request->get('transaksi_akhir');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');
        $jurusan = new Jurusan;
        $jurusan->id = $request->get('jurusan');
        $siswa = new Siswa;
        $siswa->id_siswa = $request->get('siswa');

        $tabungan->nominal += $tabungan->transaksi_akhir;

        $tabungan->kelas()->associate($kelas);
        $tabungan->jurusan()->associate($jurusan);
        $tabungan->siswa()->associate($siswa);
        $tabungan->save();

        //fungsi eloquent untuk mengupdate data inputan kita
        //Kelas::find($id)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('tabungan.index')
            ->with('success', 'Data Tabungan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tabungan::where('nis',$id)->delete();
        return redirect()->route('tabungan.index')
        -> with('success', 'Tabungan Berhasil Dihapus');
    }

    public function cari(Request $request)
    {
        $keyword = $request->cari; 
        $siswa = Siswa::where('nama',$keyword)->get('id_siswa');
        $paginate = Tabungan::where('siswa_id', 'like', '%' . $siswa . '%')->paginate(3);
        $paginate->appends(['keyword' => $siswa]);
        $title = 'Pencarian Data Siswa';
        return view('tabungan.index', compact('paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function data_tabungan()
    {
        // Mengambil semua isi tabel
        $tabungan = Tabungan::all(); 
        $kelas = DB::table('kelas')->get();
        $jurusan = DB::table('jurusan')->get();
        $siswa = DB::table('siswa')->get();
        $title = 'Data Transaksi Tabungan Siswa';
        $paginate = Tabungan::orderBy('id', 'asc')->paginate(3);
        return view('cetak_pdf.data-tabungan', compact('tabungan','siswa','kelas','jurusan','title','paginate'));
    }

    public function cetak_pdf($id)
    {
        $siswa = DB::table('siswa')->get();
        $kelas = DB::table('kelas')->get();
        $jurusan = DB::table('jurusan')->get();

        $tab = Tabungan::all()->where('id',$id)->first();
        $jml_sebelumnya = $tab->nominal - $tab->transaksi_akhir;
        
        $title = 'Cetak Nota Tabungan Siswa';
        $tgl = date("d/m/y");
        $pdf = PDF::loadview('tabungan.cetak_nota',compact('siswa','title', 'tab', 'kelas', 'jurusan','jml_sebelumnya','tgl'));
        return $pdf->stream();
    }
}
