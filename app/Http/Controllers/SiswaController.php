<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\WaliMurid;
use DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua isi tabel
        $siswa = $siswa =Siswa::all(); 
        $kelas = $kelas = DB::table('kelas')->get();
        $title = 'Data Siswa';
        $paginate = Siswa::orderBy('id_siswa', 'asc')->paginate(3);
        return view('siswa.index', compact('siswa','kelas','title','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Data Siswa';
        // $siswa = Siswa::all();
        $kelas = Kelas::all();
        $walmur = WaliMurid::all();
        // $kls = $kelas = DB::table('kelas')->get();
        // $walimurid = $walimurid= DB::table('walimurid')->get();
        return view('siswa.create', compact('title','kelas','walmur'));
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
            'foto' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'jeniskelamin' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'walmur' => 'required',
        ]);

        $image = $request->file('foto');
        if($image)
        {
           $image_name = $request->file('foto')->store('images','public');
        }

        $siswa = new Siswa;
        $siswa->foto = $image_name;
        $siswa->nis = $request->get('nis');
        $siswa->nama = $request->get('nama');
        $siswa->jeniskelamin = $request->get('jeniskelamin');
        $siswa->alamat = $request->get('alamat');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');
        $walmur = new WaliMurid;
        $walmur->id = $request->get('walmur');

        $siswa->kelas()->associate($kelas);
        $siswa->walmur()->associate($walmur);
        $siswa->save();
        
        //fungsi eloquent untuk menambah data
        //Kelas::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('siswa.index')
        ->with('success', 'Data Siswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nis)
    {
        //menampilkan detail data siswa berdasarkan Id siswa
        $siswa = Siswa::with('kelas')->where('nis',$nis)->first();
        $kelas = $kelas = DB::table('kelas')->get();
        $title = 'Data Siswa';
        return view('siswa.detail', compact('siswa', 'kelas', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nis)
    {
        //menampilkan detail data kelas berdasarkan id kelas untuk diedit
        $siswa = Siswa::all()->where('nis', $nis)->first();
        $kelas = Kelas::all();
        $walimurid = WaliMurid::all();
        $kls = $kelas = DB::table('kelas')->get();
        $walmur = $walmur = DB::table('walimurid')->get();
        $title = 'Data Siswa';
        return view('siswa.edit', compact('siswa','kelas','walmur','walimurid','kls','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nis)
    {
        //melakukan validasi data
        $request->validate([
            'foto' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'jeniskelamin' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'walmur' => 'required',
        ]);
        
        $siswa = Siswa::with('kelas')->where('nis',$nis)->first();
        $siswa->nis = $request->get('nis');
        $siswa->nama = $request->get('nama');
        $siswa->jeniskelamin = $request->get('jeniskelamin');
        $siswa->alamat = $request->get('alamat');
        if($siswa->foto && file_exists(storage_path('app/public/'.$siswa->foto)))
        {
            Storage::delete('public/'.$siswa->foto);
        }
        $image_name = $request->file('foto')->store('images','public');
        $siswa->foto = $image_name;

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');
        $walmur = new WaliMurid;
        $walmur->id = $request->get('walmur');

        $siswa->kelas()->associate($kelas);
        $siswa->walmur()->associate($walmur);
        $siswa->save();

        //fungsi eloquent untuk mengupdate data inputan kita
        //Kelas::find($id)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('siswa.index')
            ->with('success', 'Data Siswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nis)
    {
        //
        Siswa::where('nis',$nis)->delete();
        return redirect()->route('siswa.index')
        -> with('success', 'Siswa Berhasil Dihapus');
    }

    public function cari(Request $request)
    {
        $keyword = $request->cari;
        $paginate = Siswa::where('nis', 'like', '%' . $keyword . '%')
            ->orWhere('nama', 'like', '%' . $keyword . '%')
            ->paginate(3);
        $paginate->appends(['keyword' => $keyword]);
        $title = 'Pencarian Data Siswa';
        return view('siswa.index', compact('paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
