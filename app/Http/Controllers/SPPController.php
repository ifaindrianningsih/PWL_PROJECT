<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SPP;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Pembayaran;
use DB;

class SPPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua isi tabel
        $spp = SPP::all(); 
        $kelas = DB::table('kelas')->get();
        $jurusan = DB::table('jurusan')->get();
        $tagihan = DB::table('pembayaran')->get();
        $siswa = DB::table('siswa')->get();
        $title = 'Data Transaksi Pembayaran SPP';
        $paginate = SPP::orderBy('id', 'asc')->paginate(3);
        return view('spp.index', compact('spp','siswa','kelas','jurusan','tagihan','title','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Data Transaksi Pembayaran SPP';
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $tagihan = Pembayaran::all();
        // $kls = $kelas = DB::table('kelas')->get();
        // $walimurid = $walimurid= DB::table('walimurid')->get();
        return view('spp.create', compact('title','siswa','kelas','jurusan','tagihan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //melakukan validasi data
        $request->validate([
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'tagihan' => 'required',
            'total_bayar' => 'required',
            'tgl_transaksi' => 'required',
        ]);

        $spp = new SPP;
        $spp->total_bayar = $request->get('total_bayar');
        
        $spp->tgl_transaksi = $request->get('tgl_transaksi');

        $nama = new Siswa;
        $nama->id_siswa = $request->get('nama_siswa');
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');
        $jurusan = new Jurusan;
        $jurusan->id = $request->get('jurusan');
        $tagihan = new Pembayaran;
        $tagihan->id = $request->get('tagihan');

        $th = Pembayaran::where('id',$spp->id)->get('tagihan');
        $total = $th - $tagihan->total_bayar;

        $spp->siswa()->associate($nama);
        $spp->kelas()->associate($kelas);
        $spp->jurusan()->associate($jurusan);
        $spp->tagihan()->associate($tagihan);
        $spp->save();

        // $h = $spp->tagihan_id;
        // $tagihan = SPP::find($h);
        $th = $spp->id;
        $tagihan = Pembayaran::where('tagihan',$spp->tagihan->id)->get('tagihan');

        $n = SPP::where('tagihan_id', $tagihan)->get();
        dd($n);
        $total = $tagihan['tagihan'] - $tagihan['total_bayar'];
        Pembayaran::where('id', $tagihan->id)->update($total);

        
        //fungsi eloquent untuk menambah data
        //Kelas::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('spp.index')
        ->with('success', 'Data Siswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data siswa berdasarkan Id siswa
        $spp = SPP::all()->where('id',$id)->first();
        $tagihan = DB::table('pembayaran')->get();
        $siswa = DB::table('siswa')->get();
        $kelas = DB::table('kelas')->get();
        $jurusan = DB::table('jurusan')->get();
        $title = 'Data Siswa';
        return view('spp.detail', compact('spp', 'tagihan', 'siswa', 'kelas', 'jurusan', 'title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spp = SPP::all()->where('id', $id)->first();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $tagihan = Pembayaran::all();
        $sw = DB::table('siswa')->get();
        $kls = DB::table('kelas')->get();
        $jrs = DB::table('jurusan')->get();
        $tgh = DB::table('pembayaran')->get();
        $title = 'Data Transaksi Pembayaran SPP';
        return view('spp.edit', compact('spp','siswa','kelas','jurusan','tagihan','kls','jrs','sw','tgh','title'));
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
        //melakukan validasi data
        $request->validate([
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'tagihan' => 'required',
            'total_bayar' => 'required',
            'tgl_transaksi' => 'required',
        ]);

        $spp = SPP::all()->where('id',$id)->first();
        $spp->total_bayar = $request->get('total_bayar');

        $tagihan = Pembayaran::all()->where('nama',$id)->get('total_bayar');
        $tagihan = new Pembayaran;
        $tagihan->total_bayar = $request->get('tagihan');
        $tagihan->save();

        $spp->tgl_transaksi = $request->get('tgl_transaksi');

        $siswa = new Siswa;
        $siswa->id_siswa = $request->get('nama_siswa');
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');
        $jurusan = new Jurusan;
        $jurusan->id = $request->get('jurusan');
        $tagihan = new Pembayaran;
        $tagihan->id = $request->get('tagihan');

        $spp->siswa()->associate($siswa);
        $spp->kelas()->associate($kelas);
        $spp->jurusan()->associate($jurusan);
        $spp->tagihan()->associate($tagihan);
        $spp->save();
        
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('spp.index')
            ->with('success', 'Data Transaksi Pembayaran SPP Berhasil Diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        SPP::where('id',$id)->delete();
        return redirect()->route('spp.index')
        -> with('success', 'Transaksi Pembayaran SPP Berhasil Dihapus');
    }

    public function cari(Request $request, SPP $spp)
    {
        $keyword = $request->cari; 
        $siswa = Siswa::where('nama',$keyword)->get('id_siswa');
        $paginate = SPP::where('nama_siswa', 'like', '%' . $siswa . '%')->paginate(3);
        $paginate->appends(['keyword' => $siswa]);
        $title = 'Pencarian Data Siswa';
        return view('spp.index', compact('paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
