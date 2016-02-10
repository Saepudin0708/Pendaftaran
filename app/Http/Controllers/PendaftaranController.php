<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;

Class PendaftaranController extends Controller
{
    public function getPendaftaran()
    {
        return view('pendaftaran');
    }

    public function postPendaftaran(Request $request)
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
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors, 400);
        }

        return response()->json(array('message' => 'Data berhasil ditambah'), 200);

    }

}
