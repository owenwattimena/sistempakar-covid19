<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Info;
class InfoController extends Controller
{
    //
    public function index(){
        $data['info'] = Info::all(); 
        return view('admin.pages.info', $data);
    }
    
    public function edit($info){
        $data['info'] = Info::where('info', strtoupper($info))->first(); 
        return view('admin.pages.info_edit', $data);
    }

    public function update(Request $request, $info){
        if ($request) {
            $tentang = Info::where('info',strtoupper($info))->first();
            $tentang->body = $request->body;
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
        return redirect()->route('edit_info',['info' => strtolower($info)])->with($alert);
    }
}