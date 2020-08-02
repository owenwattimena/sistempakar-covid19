<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Info;
class PencegahanController extends Controller
{
    //
    public function index(){
        $data['pencegahan'] = Info::where('info', 'PENCEGAHAN')->first(); 
        return view('admin.pages.pencegahan', $data);
    }

    public function update(Request $request){
        if ($request) {
            $pencegahan = Info::where('info','PENCEGAHAN')->first();
            $pencegahan->body = $request->pencegahan;
            if ($pencegahan->save()) {
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