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

    public function postUploadToTemporary(Request $request)
    {
        $request->file('photo');
        if ($request->file('photo')->isValid()) {
            $filename = md5(date("YmdHis")) . $request->file('photo')->getClientOriginalName();
            $image_path = base_path() . '/public/tmp/';
            $request->file('photo')->move($image_path, $filename);
            return response()->json(array('message' => 'Photo uploaded', 'photo' => $filename), 200);
        } else {
            return response()->json(array('message' => 'Error while uploading photo'), 200);
        }
    }

    public function MoveTemporaryUpload($filename)
    {
        $old_path = base_path() . '/public/tmp/' . $filename;
        $new_path = base_path() . '/public/images/' . $filename;
        File::move($old_path, $new_path);
    }

}
