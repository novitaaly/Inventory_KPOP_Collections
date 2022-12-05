<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    public function tambah($id){
        return view('poster/tambah',['id_album' => $id]);
    }
    public function store($id, Request $request){
        if(DB::statement('INSERT INTO poster VALUES (null, ?, ?, ?)', [$request->member,$request->idol,$id])){
            return back()->with('success','Penambahan poster berhasil!'); 
        }
        return back()->with('fail','Penambahan poster gagal, silahkan coba lagi'); 
    }
    public function destroy($id){
        if(DB::statement('DELETE FROM poster WHERE ID_POSTER = ?', [$id])){
            return back()->with('success_poster','Hapus poster berhasil!'); 
        }
        return back()->with('fail_poster','Hapus poster gagal, silahkan coba lagi'); 
    }
    public function ubah($id){
        return view('poster/ubah',['poster' => DB::select('SELECT * FROM poster WHERE ID_POSTER = ?', [$id])[0]]);
    }
    public function update($id,Request $request){
        if(DB::statement('UPDATE poster SET MEMBER = ?, IDOL_GROUP = ? WHERE ID_POSTER = ?', [$request->member,$request->idol, $id])){
            return back()->with('success','Pengubahan poster berhasil!'); 
        }
        return back()->with('fail','Pengubahan poster gagal, silahkan coba lagi'); 
    }
}
