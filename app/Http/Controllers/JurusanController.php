<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;

Class JurusanController extends Controller
{
    public function getDaftarJurusan()
    {
        return view('jurusan');
    }
    
    public function validation()
    {
        $validator = Validator::make($request->all(), [
            'tahun_ajaran' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
            'foto' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors, 400);
        }
    }
    
}
