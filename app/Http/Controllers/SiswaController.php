<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    function index(){
        // $nama = 'Karston Artageana Alexandra';
        // $jk = 'laki-laki';
        // return view('belajar', compact('nama', 'jk'));

        // $siswa = DB::table('t_siswa')->where('golongan_darah', '=', 'O')->get();

        // $siswa = DB::table('t_siswa')->get();
        // return view('belajar', compact('siswa'));

        $data['siswa'] = \App\Models\Siswa::orderBy('jk')->get();
        return view('belajar');
    }

    function create(){
        return view('siswa.form');
    }

    function store(Request $request){
    $rule = [
        'nis' => 'required|numeric',
        'nama_lengkap' => 'required|string',
        'jk' => 'required',
        'golongan_darah' => 'required',
    ];
    $this->validate($request, $rule);
    $input = $request->all();
    // $status = \App\Models\Siswa::create($input);

        $siswa = new \App\Models\siswa()
        $siswa -> nis = $input['nis'];
        $siswa -> nama_lengkap = $input['nama_lengkap'];
        $siswa -> kelas = $input['kelas'];
        $siswa -> jenis_kelamin = $input['jenis_kelamin'];
        $siswa -> jurusan = $input['jurusan'];
        $siswa -> golongan_darah = $input['golongan_darah'];


    if($status){
        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
    } else{
        return redirect('/siswa/create')->with('error', 'Data gagal ditambahkan');
    }

    }

    function edit(Request $request, $id)
    {
        $siswa = DB::table('t_siswa')->find($id);
        return view('siswa.form', compact('siswa'));
    }

    function update(Request $request, $id){
        $request->validate([
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jk' => 'required',
            'golongan_darah' => 'required',
        ]);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $status = DB::table('t_siswa')->where('id', $id)->update($input);
        if($status){
            return redirect('/siswa')->with('success', 'Data berhasil diubah');
        }
        else{
            return redirect('/siswa/edit' . $id)->with('error', 'Data gagal diubah');
        }
    }

    function destroy($id){
        $status = DB::table('t_siswa')->where('id', $id)->delete();
        if($status){
            return redirect('/siswa')->with('success', 'Data berhasil dihapus');
        }
        else{
            return redirect('/siswa')->with('error', 'Data gagal dihapus');
        }
    }
}
