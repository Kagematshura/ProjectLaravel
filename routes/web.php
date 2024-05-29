<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/belajar', [SiswaController::class, 'index']);
// Route::get('/learn', [KelasController::class, 'index']);
// Route::get('/study', [SiswaController::class, 'index']);

// Route::get('/belajar', function(){
//     // echo "Belajar Laravel, tulisan ini ditampilkan dari Routes";
    
//     // $data['nama'] = 'Fajar';
//     // $data['jk'] = 'laki-laki';
//     // return view('belajar', $data);

//     $nama = 'Fajar';
//     $jk = 'Laki - Laki';
//         return view('belajar', compact('nama', 'jk'));
// });
// Route::get('/study', function(){
//     // echo "Study Laravel, tulisan ini ditampilkan dari Routes";
//     return view('study');
// });
// Route::get('/learning', function(){
//     // echo "Learning Laravel, tulisan ini ditampilkan dari Routes";
//     return view('learn');
// });

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
Route::patch('/siswa/{id}', [SiswaController::class, 'update']);
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);

Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/create', [KelasController::class, 'create']);
Route::post('/kelas', [KelasController::class, 'store']);