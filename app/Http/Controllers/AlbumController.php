<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(){
        return view('album/index',['albums' => DB::select('SELECT a.*, 
        COALESCE(p1.c,0) AS jumlah_pc,
        COALESCE(p2.c,0) AS jumlah_poster
        FROM album AS a
        LEFT JOIN (
            SELECT COUNT(*) AS c, ID_ALBUM
            FROM pc
            GROUP BY ID_ALBUM
        ) AS p1
        ON p1.ID_ALBUM = a.ID_ALBUM
        LEFT JOIN (
            SELECT COUNT(*) AS c, ID_ALBUM
            FROM poster
            GROUP BY ID_ALBUM
        ) AS p2
        ON p2.ID_ALBUM = a.ID_ALBUM')]);
    }
    public function tambah(){
        return view('album/tambah');
    }
    public function store(Request $request){
        if(DB::statement('INSERT INTO album VALUES (null, ?, ?, ?, ?, 0)', [$request->tittle,$request->idol,$request->type,$request->year])){
            return back()->with('success','Penambahan album berhasil!'); 
        }
        return back()->with('fail','Penambahan album gagal, silahkan coba lagi'); 
    }
    public function destroy($id){
        if(DB::statement('UPDATE album SET DELETED = 1 WHERE ID_ALBUM = ?', [$id])){
            return back()->with('success','Hapus album berhasil!'); 
        }
        return back()->with('fail','Hapus album gagal, silahkan coba lagi'); 
    }
    public function ubah($id){
        return view('album/ubah',['album' => DB::select('SELECT * FROM album WHERE ID_ALBUM = ?', [$id])[0]]);
    }
    public function update($id,Request $request){
        if(DB::statement('UPDATE album SET ALBUM_TITTLE = ?, IDOL_GROUP = ?, ALBUM_TYPE = ?, RELEASE_YEAR = ? WHERE ID_ALBUM = ?', [$request->tittle,$request->idol,$request->type,$request->year, $id])){
            return back()->with('success','Pengubahan album berhasil!'); 
        }
        return back()->with('fail','Pengubahan album gagal, silahkan coba lagi'); 
    }
    public function detail($id){
        $album = DB::select('SELECT * FROM album WHERE ID_ALBUM = ?', [$id])[0];
        $listPC = DB::select('SELECT * FROM pc WHERE ID_ALBUM = ?', [$id]);
        $listPoster = DB::select('SELECT * FROM poster WHERE ID_ALBUM = ?', [$id]);
        return view('album/detail',['album' => $album, "pcs" => $listPC, "posters" => $listPoster]);
    }
}
