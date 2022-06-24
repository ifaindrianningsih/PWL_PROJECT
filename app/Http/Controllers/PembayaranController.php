<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\SPP;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $pembayaran = Pembayaran::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('nama_siswa','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $title = 'Data Tagihan Siswa';
            return view('pembayaran.index',compact('pembayaran','title'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Data Tagihan Siswa';
        return view('pembayaran.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SPP $spp)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'semester' => 'required',
            'tagihan' => 'required',
            // 'terbayar' => 'required',
            // 'total' => 'required',
            'status' => 'required',
        ]);

        $tagihan = Pembayaran::all();
        $tagihan->nama_siswa = $request->get('nama_siswa');
        $tagihan->semester = $request->get('semester');
        $tagihan->tagihan = $request->get('tagihan');
        
        // if($tagihan->terbayar=null){
        //     $spp = SPP::where('nama_siswa',$id)->get('total_bayar');
        // }

        $tagihan->status = $request->get('status');
        $tagihan->save();

        
        $spp = SPP::all();
        $th = Pembayaran::where('id',$spp->tagihan_id)->get('tagihan');
        $n = SPP::where('tagihan_id', $tagihan->id)->get('total_bayar');
        dd($th);
        $total = $th['tagihan'] - $n['total_bayar'];
        Pembayaran::where('id', $th->id)->update($total);

        // Pembayaran::create($request->all());

        return redirect()->route('pembayaran.index')
        ->with('success', 'Data Tagihan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembayaran = Pembayaran::find($id);
        $title = 'Data Tagihan Siswa';
        return view('pembayaran.detail', compact('pembayaran', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = DB::table('pembayaran')->where('id', $id)->first();;
        $title = 'Data Tagihan Siswa';
        return view('pembayaran.edit', compact('pembayaran','title'));
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
            'semester' => 'required',
            'tagihan' => 'required',
            // 'terbayar' => 'required',
            // 'total' => 'required',
            'status' => 'required',
        ]);

        Pembayaran::find($id)->update($request->all());
        
        return redirect()->route('pembayaran.index')
            ->with('success', 'Data Tagihan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembayaran::find($id)->delete();
        return redirect()->route('pembayaran.index')
        -> with('success', 'Data Tagihan Berhasil Dihapus');
    }
}
