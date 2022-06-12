<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Jurusan;
use DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua isi tabel
        $kelas = $kelas =Kelas::with('jurusan')->get(); 
        $jurusan = $jurusan = DB::table('jurusan')->get();
        $title = 'Data Kelas';
        $paginate = Kelas::orderBy('id', 'asc')->paginate(3);
        return view('kelas.index', compact('kelas','jurusan','title','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Data Kelas';
        $jurusan = Jurusan::all();
        $jrs = $jurusan = DB::table('jurusan')->get();
        return view('kelas.create', compact('title','jrs','jurusan'));
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
            'nama_kelas' => 'required',
            'jurusan' => 'required',
            'total_siswa' => 'required',
        ]);

        $kelas = new Kelas;
        $kelas->nama_kelas = $request->get('nama_kelas');
        $kelas->total_siswa = $request->get('total_siswa');

        $jurusan = new Jurusan;
        $jurusan->id = $request->get('jurusan');

        $kelas->jurusan()->associate($jurusan);
        $kelas->save();
        
        //fungsi eloquent untuk menambah data
        //Kelas::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('kelas.index')
        ->with('success', 'Data Kelas Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data kelas berdasarkan Id kelas
        $kelas = Kelas::with('jurusan')->where('id',$id)->first();
        $jurusan = $jurusan = DB::table('jurusan')->get();
        $title = 'Data Kelas';
        return view('kelas.detail', compact('kelas', 'jurusan', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data kelas berdasarkan id kelas untuk diedit
        $kelas = Kelas::with('jurusan')->where('id', $id)->first();
        $jurusan = Jurusan::all();
        $jrs = $jurusan = DB::table('jurusan')->get();
        $title = 'Data Kelas';
        return view('kelas.edit', compact('kelas','jurusan','jrs','title'));
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
            'nama_kelas' => 'required',
            'total_siswa' => 'required',
            'jurusan' => 'required',
        ]);

        
        $kelas = Kelas::with('jurusan')->where('id',$id)->first();
        $kelas->nama_kelas = $request->get('nama_kelas');
        $kelas->total_siswa = $request->get('total_siswa');

        $jurusan = new Jurusan;
        $jurusan->id = $request->get('jurusan');

        $kelas->jurusan()->associate($jurusan);
        $kelas->save();

        //fungsi eloquent untuk mengupdate data inputan kita
        //Kelas::find($id)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('kelas.index')
            ->with('success', 'Data Kelas Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::find($id)->delete();
        return redirect()->route('kelas.index')
        -> with('success', 'Kelas Berhasil Dihapus');
    }

    public function cari(Request $request)
    {
        $keyword = $request->cari;
        $paginate = Kelas::where('nama_kelas', 'like', '%' . $keyword . '%')->paginate(3);
        $paginate->appends(['keyword' => $keyword]);
        $title = 'Pencarian Data Kelas';

        $kelas = $kelas =Kelas::with('jurusan')->get(); 
        $jurusan = $jurusan = DB::table('jurusan')->get();

        return view('kelas.index', compact('kelas','jurusan','paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
}
