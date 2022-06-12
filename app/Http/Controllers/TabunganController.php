<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tabungan;
use App\Models\Kelas;
use App\Models\Jurusan;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabungan = $tabungan = Tabungan::all(); 
        $kelas = $kelas = DB::table('kelas')->get();
        $jurusan = $jurusan = DB::table('jurusan')->get();
        $title = 'Transaksi Tabungan';
        $paginate = Tabungan::orderBy('id', 'asc')->paginate(3);
        return view('tabungan.index', compact('tabungan','kelas','jurusan', 'title','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Transaksi Tabungan';
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('tabungan.create', compact('title','kelas','jurusan'));
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
            'nama_siswa' => 'required',
            'nis' => 'required',
            'kelas_id' => 'required',
            'jurusan_id' => 'required',
            'nominal' => 'required',
        ]);

        $tabungan = new Tabungan;
        $tabungan->nama_siswa = $request->get('nama_siswa');
        $tabungan->nis = $request->get('nis');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $jurusan = new Jurusan;
        $jurusan->id = $request->get('jurusan');

        $tabungan->nominal = $request->get('nominal');

        $tabungan->kelas()->associate($kelas);
        $tabungan->jurusan()->associate($jurusan);
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
        $tabungan = Tabungan::with('kelas')->where('nis',$id)->first();
        $kelas = $kelas = DB::table('kelas')->get();
        $jurusan = $jurusan = DB::table('jurusan')->get();
        $title = 'Data Tabungan';
        return view('tabungan.detail', compact('tabungan', 'kelas', 'jurusan', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabungan = Tabungan::all()->where('nis', $id)->first();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $kls = $kelas = DB::table('kelas')->get();
        $jrs = $jrs = DB::table('jurusan')->get();
        $title = 'Data Tabungan';
        return view('tabungan.edit', compact('tabungan','kelas','jurusan','jrs','kls','title'));
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
            'nama_siswa' => 'required',
            'nis' => 'required',
            'kelas_id' => 'required',
            'jurusan_id' => 'required',
            'nominal' => 'required',
        ]);
        
        $tabungan = Tabungan::with('kelas')->where('nis',$id)->first();
        $tabungan->nama_siswa = $request->get('nama_siswa');
        $tabungan->nis = $request->get('nis');
        $tabungan->nama = $request->get('nama');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');
        $jurusan = new Jurusan;
        $jurusan->id = $request->get('jurusan');

        $tabungan->nominal = $request->get('nominal');

        $tabungan->kelas()->associate($kelas);
        $tabungan->jurusan()->associate($jurusan);
        
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
        $paginate = Tabungan::where('nis', 'like', '%' . $keyword . '%')
            ->orWhere('nama', 'like', '%' . $keyword . '%')
            ->paginate(3);
        $paginate->appends(['keyword' => $keyword]);
        $title = 'Pencarian Data Tabungan Siswa';
        return view('tabungan.index', compact('paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
