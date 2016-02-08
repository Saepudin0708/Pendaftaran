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
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $error = array();
        if ($validator->fails()) {
            $error = $validator->errors();
        }


        return response()->json($error, 200);

        array(
                'message' => array(
                        'wongka harus disini', 'sapi harus disi'
                    );
            );
    }

}
