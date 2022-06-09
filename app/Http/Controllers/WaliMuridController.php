<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaliMurid;
use Illuminate\Support\Facades\DB;

class WaliMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $walimurid = WaliMurid::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('nama_siswa','like',"%{$request->keyword}%")
            ->orWhere('nama_ayah','like',"%{$request->keyword}%")
            ->orWhere('nama_ibu','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $title = 'Data Wali Murid';
            return view('walimurid.index',compact('walimurid','title'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Data Wali Murid';
        return view('walimurid.create', compact('title'));
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
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'umur_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'umur_ibu' => 'required',
            'alamat' => 'required',
        ]);

        WaliMurid::create($request->all());

        return redirect()->route('walimurid.index')
        ->with('success', 'Data Wali Murid Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $walimurid = WaliMurid::find($id);
        $title = 'Data Wali Murid';
        return view('walimurid.detail', compact('walimurid', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $walimurid = DB::table('walimurid')->where('id', $id)->first();;
        $title = 'Data Wali Murid';
        return view('walimurid.edit', compact('walimurid','title'));
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
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'umur_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'umur_ibu' => 'required',
            'alamat' => 'required',
        ]);

        WaliMurid::find($id)->update($request->all());
        
        return redirect()->route('walimurid.index')
            ->with('success', 'Data Wali Murid Berhasil Diupdate');
            return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WaliMurid::find($id)->delete();
        return redirect()->route('walimurid.index')
        -> with('success', 'Data Wali Murid Berhasil Dihapus');
    }
}
