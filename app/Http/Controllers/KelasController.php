<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
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
        $kelas = $kelas = DB::table('kelas')->get(); 
        $title = 'Data Kelas';
        return view('kelas.index', compact('kelas','title'));
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
        return view('kelas.create', compact('title'));
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
            'total_siswa' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Kelas::create($request->all());
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
        $kelas = Kelas::find($id);
        $title = 'Data Kelas';
        return view('kelas.detail', compact('kelas', 'title'));
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
        $kelas = DB::table('kelas')->where('id', $id)->first();;
        $title = 'Data Kelas';
        return view('kelas.edit', compact('kelas','title'));
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
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        Kelas::find($id)->update($request->all());
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
}
