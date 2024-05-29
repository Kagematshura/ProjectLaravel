<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    function index(){
        $kelas = DB::table('t_kelas')->get();
        // $kelas = DB::table('t_kelas')->where('nama_wali_kelas', 'LIKE', 'A%')->get();
        // $kelas = DB::table('t_kelas')->orderBy('jurusan')->orderBy('nama_kelas')->get();
        // $kelas = DB::table('t_kelas')->where('jurusan', '=', 'Rekayasa Perangkat Lunak')->get(); 
        return view('learn', compact('kelas'));
    }

    function create(){
        return view('kelas.form');
    }

    function store(Request $request){

        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'jurusan' => 'required|string',
            'lokasi_ruangan' => 'required|string',
            'nama_wali_kelas' => 'required|string',
        ]);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_kelas')->insert($input);
        if($status){
            return redirect('/kelas')->with('success', 'Data behasil ditambahkan');
        }
        else{
            return redirect('/kelas/create')->with('error', 'Data gagal ditambahkan');
        }
    }
}