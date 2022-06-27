<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 3;
        $pengguna = Pengguna::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('name','like',"%{$request->keyword}%")
            ->orWhere('email','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);
        


            $title = 'Data Pengguna';
            return view('pengguna.index',compact('pengguna','title'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    public function show($id)
    {
        //menampilkan detail data pengguna
        $pengguna = Pengguna::find($id);
        $title = 'Data Pengguna';
        return view('pengguna.detail', compact('pengguna', 'title'));
    }

    public function cari(Request $request)
    {
        $keyword = $request->cari;
        $paginate = Pengguna::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('username', 'like', '%' . $keyword . '%')
            ->paginate(3);
        $paginate->appends(['keyword' => $keyword]);
        $title = 'Pencarian Data Pengguna';
        return view('pengguna.index', compact('paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
