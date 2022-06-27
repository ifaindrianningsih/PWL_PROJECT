<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\SPP;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
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
            ->orWhere('nama_pengguna','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $title = 'Data Tagihan';
            return view('pembayaran.index',compact('pembayaran','title'))
                ->with('i',(request()->input('page',1)-1)*$pagination);

        $pagination = 5;
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Data Tagihan Siswa';
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('pembayaran.create', compact('title','kelas','jurusan','siswa'));
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
            'semester' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'tagihan' => 'required',
            'status' => 'required',
        ]);
        
        $pemb = new Pembayaran;
        $pemb->semester = $request->get('semester');
        $pemb->tagihan = $request->get('tagihan');
        $pemb->status = $request->get('status');

        $siswa = new Siswa;
        $siswa->id_siswa = $request->get('siswa');
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');
        $jurusan = new Jurusan;
        $jurusan->id = $request->get('jurusan');

        
        $pemb->siswa()->associate($siswa);
        $pemb->kelas()->associate($kelas);
        $pemb->jurusan()->associate($jurusan);
        $pemb->save();
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
        $pembayaran = Pembayaran::all()->find($id);
        $kelas = DB::table('kelas')->get();
        $jurusan = DB::table('jurusan')->get();
        $siswa = DB::table('siswa')->get();
        $title = 'Data Tagihan Siswa';
        return view('pembayaran.detail', compact('pembayaran', 'title','kelas','jurusan','siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::all()->where('id', $id)->first();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $siswa = Siswa::all();
        $kls = DB::table('kelas')->get();
        $jrs = DB::table('jurusan')->get();
        $sw = DB::table('siswa')->get();
        $title = 'Data Tagihan Siswa';
        return view('pembayaran.edit', compact('pembayaran','title','kelas','jurusan','siswa','kls','jrs','sw'));
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
            'semester' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'tagihan' => 'required',
            'status' => 'required',
        ]);

        $pemb = Pembayaran::all()->where('id',$id)->first();
        $pemb->semester = $request->get('semester');
        $pemb->tagihan = $request->get('tagihan');
        $pemb->status = $request->get('status');

        $siswa = new Siswa;
        $siswa->id_siswa = $request->get('siswa');
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');
        $jurusan = new Jurusan;
        $jurusan->id = $request->get('jurusan');

        
        $pemb->siswa()->associate($siswa);
        $pemb->kelas()->associate($kelas);
        $pemb->jurusan()->associate($jurusan);
        $pemb->save();
        
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

    public function cari(Request $request, Pembayaran $pembayaran)
    {
        $keyword = $request->cari; 
        $siswa = Siswa::where('nama',$keyword)->get('id_siswa');
        $paginate = Pembayaran::where('nama', 'like', '%' . $siswa . '%')->paginate(3);
        $paginate->appends(['keyword' => $siswa]);
        $title = 'Pencarian Data Tagihan';
        return view('pembayaran.index', compact('paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
