<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gejala;

class GejalaController extends Controller
{
    //
    public function index(){
        $data['gejala'] = Gejala::all();
        return view('admin.pages.gejala', $data);
    }

    public function create(Request $request){
        # code...
        if ($request) {
            $gejala = new Gejala;
            $gejala->gejala = $request->gejala;
            $gejala->deskripsi = $request->deskripsi;
            $gejala->nilai_mb = $request->nilai_mb;
            $gejala->nilai_md = $request->nilai_md;
            
            if ($gejala->save()) {
                # code...
                $alert = [
                    "type" => "alert-success",
                    "msg"  => "Data berhasil ditambahkan!"
                ];
            }else{
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Data gagal ditambahkan!"
                ];
            }
        }else{
            $alert = [
                "type" => "alert-danger",
                "msg"  => "Data gagal ditambahkan!"
            ];
        }
        return redirect()->route('gejala')->with($alert);
    }

    public function update(Request $request, $id){
        if ($request) {
            $gejala = gejala::findOrFail($id);
            $gejala->gejala = $request->gejala;
            $gejala->deskripsi = $request->deskripsi;
            $gejala->nilai_mb = $request->nilai_mb;
            $gejala->nilai_md = $request->nilai_md;
            
            if ($gejala->save()) {
                # code...
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
        }else{
            $alert = [
                "type" => "alert-danger",
                "msg"  => "Data gagal ditambahkan!"
            ];
        }
        return redirect()->route('gejala')->with($alert);
    }
    
    public function destroy($id){
        $gejala = gejala::findOrFail($id);
        if ($gejala->delete()) {
            # code...
            $alert = [
                "type" => "alert-success",
                "msg"  => "Data berhasil di hapus!"
            ];
        }else{
            $alert = [
                "type" => "alert-danger",
                "msg"  => "Data gagal dihapus!"
            ];
        }
        return redirect()->route('gejala')->with($alert);

    }

}