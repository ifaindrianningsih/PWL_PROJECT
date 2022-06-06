<?php

namespace App\Http\Controllers;

use App\Models\WaliMurid;
use Illuminate\Http\Request;

class WalmurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $pagination = 5;
        $walmur = WaliMurid::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('nama_siswa','like',"%{$request->keyword}%")
            ->orWhere('nama_ayah','like',"%{$request->keyword}%")
            ->orWhere('nama_ibu','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $title = 'Data Wali Murid';
            return view('walmur.walmurIndex',compact('walmur','title'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $walmur = WaliMurid::all();
        return view('walmur.walmurIndex',['walmur'=>$walmur]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'id'=> 'required|string|max:10',
            'nama_siswa' => 'required|string',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'umur_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'umur_ibu' => 'required',
            'alamat' => 'required',
        ]);

        $walmur = new WaliMurid();
        $walmur->id = $request->get('id');
        $walmur->nama_siswa = $request->get('nama_siswa');
        $walmur->nama_ayah = $request->get('nama_ayah');
        $walmur->pekerjaan_ayah = $request->get('pekerjaan_ayah');
        $walmur->umur_ayah = $request->get('umur_ayah');
        $walmur->nama_ibu = $request->get('nama_ibu');
        $walmur->pekerjaan_ibu = $request->get('pekerjaan_ibu');
        $walmur->umur_ibu = $request->get('umur_ibu');
        $walmur->alamat = $request->get('alamat');

        $walmur->save();

        return redirect()->route('walmur.index')->with('success', 'Data Wali Murid Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $walmur = WaliMurid::find($id);
        return view('walmur.walmurDetail',compact('walmur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $walmur = WaliMurid::find($id);
        return view('walmur.walmurEdit',compact('walmur'));
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
        $request -> validate([
            'id'=> 'required|string|max:10',
            'nama_siswa' => 'required|string',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'umur_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'umur_ibu' => 'required',
            'alamat' => 'required',
        ]);

        $walmur = WaliMurid::where('id', $id)->first();
        $walmur->id = $request->get('id');
        $walmur->nama_siswa = $request->get('nama_siswa');
        $walmur->nama_ayah = $request->get('nama_ayah');
        $walmur->pekerjaan_ayah = $request->get('pekerjaan_ayah');
        $walmur->umur_ayah = $request->get('umur_ayah');
        $walmur->nama_ibu = $request->get('nama_ibu');
        $walmur->pekerjaan_ibu = $request->get('pekerjaan_ibu');
        $walmur->umur_ibu = $request->get('umur_ibu');
        $walmur->alamat = $request->get('alamat');
        
        $walmur->save();

        return redirect()->route('walmur.index')
        ->with('success', 'Data Wali Murid Berhasil Diupdate');
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
        return redirect()->route('walmur.index')
            -> with('success', 'Data Wali Murid Berhasil Dihapus');
    }
}
