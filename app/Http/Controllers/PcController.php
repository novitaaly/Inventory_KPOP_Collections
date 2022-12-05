<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PcController extends Controller
{
    public function tambah($id){
        return view('pc/tambah',['id_album' => $id]);
    }
    public function store($id, Request $request){
        if(DB::statement('INSERT INTO pc VALUES (null, ?, ?, ?, ?)', [$request->member,$request->idol,$request->type,$id])){
            return back()->with('success','Penambahan photocard berhasil!'); 
        }
        return back()->with('fail','Penambahan photocard gagal, silahkan coba lagi'); 
    }
    public function destroy($id){
        if(DB::statement('DELETE FROM pc WHERE ID_PC = ?', [$id])){
            return back()->with('success_pc','Hapus photocard berhasil!'); 
        }
        return back()->with('fail_pc','Hapus photocard gagal, silahkan coba lagi'); 
    }
    public function ubah($id){
        return view('pc/ubah',['pc' => DB::select('SELECT * FROM pc WHERE ID_PC = ?', [$id])[0]]);
    }
    public function update($id,Request $request){
        if(DB::statement('UPDATE pc SET MEMBER = ?, IDOL_GROUP = ?, PC_TYPE = ? WHERE ID_PC = ?', [$request->member,$request->idol,$request->type, $id])){
            return back()->with('success','Pengubahan photocard berhasil!'); 
        }
        return back()->with('fail','Pengubahan photocard gagal, silahkan coba lagi'); 
    }
}
