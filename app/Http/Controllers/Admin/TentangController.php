<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Info;
class TentangController extends Controller
{
    //
    public function index(){
        $data['tentang'] = Info::where('info', 'TENTANG')->first(); 
        return view('admin.pages.tentang', $data);
    }

    public function update(Request $request){
        if ($request) {
            $tentang = Info::where('info','TENTANG')->first();
            $tentang->body = $request->tentang;
            if ($tentang->save()) {
                $alert = [
                    "type" => "alert-success",
                    "msg"  => "Data berhasil diubah!"
                ];
            }else{
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Data gagal diubah!"
                ];
            }
        }
        return redirect()->route('tentang')->with($alert);
    }
}