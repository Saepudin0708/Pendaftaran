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
        $this->validation($request);
        
        $this->MoveTemporaryUpload($request->input('foto'));

        \DB::table('pendaftaran')->insert([
            'tahun' => $request->input('tahun_ajaran'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tahun') . "-" . $request->input('bulan') . "-" .$request->input('tanggal'),
            'alamat' => $request->input('alamat'),
            'foto' => $request->input('foto'),
            'deleted_at' => null,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => null,
        ]);

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
        \File::move($old_path, $new_path);
    }

    public function getPendaftaranEdit($id)
    {
        $student = \DB::table('pendaftaran')
            ->where('id', '=', $id)
            ->first();

        return view('pendaftaran', [
            'id' => $id,
            'data' => $student
        ]);
    }

    public function patchPendaftaranEdit(Request $request)
    {
        $id = $request->input('id');
        $student = \DB::table('pendaftaran')
            ->where('id', '=', $id)
            ->first();
            
        $this->validation($request);

        $update = [
            'tahun' => $request->input('tahun_ajaran'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tahun') . "-" . $request->input('bulan') . "-" .$request->input('tanggal'),
            'alamat' => $request->input('alamat'),
            'updated_at' => date("Y-m-d H:i:s"),
        ];        

        if ($student->foto != $request->input('foto')) {
            $update = array_merge($update, ['foto' => $request->input('foto')]);
            $this->MoveTemporaryUpload($request->input('foto'));
        }
        
        $student = \DB::table("pendaftaran");
        $student->where('id', $id);
        $student->update($update);
    }

    public function validation($request)
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
