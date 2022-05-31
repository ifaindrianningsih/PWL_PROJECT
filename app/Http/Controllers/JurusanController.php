<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use DB;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua isi tabel
        $jurusan = $jurusan = DB::table('jurusan')->get(); 
        $title = 'Data Jurusan';
        return view('jurusan.index', compact('jurusan','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Data Jurusan';
        return view('jurusan.create', compact('title'));
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
            'nama_jurusan' => 'required',
            'total_kelas' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Jurusan::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('jurusan.index')
        ->with('success', 'Data jurusan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data kelas berdasarkan Id jurusan
        $jurusan = Jurusan::find($id);
        $title = 'Data Jurusan';
        return view('jurusan.detail', compact('jurusan', 'title'));
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
        $jurusan = DB::table('jurusan')->where('id', $id)->first();;
        $title = 'Data Jurusan';
        return view('jurusan.edit', compact('jurusan','title'));
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
            'nama_jurusan' => 'required',
            'total_kelas' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        Jurusan::find($id)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('jurusan.index')
            ->with('success', 'Data Jurusan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jurusan::find($id)->delete();
        return redirect()->route('jurusan.index')
        -> with('success', 'Jurusan Berhasil Dihapus');
    }
}
