<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
class DiagnosaController extends Controller
{
    //
    public function index(){
        return view('apps/pages/diagnosa');
    }

    public function get(){
        $gejala = Gejala::all();
        $response = [
            'status' => 'success',
            'data'  => $gejala
        ];
        return response()->json($response);
    }
}