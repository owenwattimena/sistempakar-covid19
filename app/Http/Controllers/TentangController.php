<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
class TentangController extends Controller
{
    //
    public function index(){
        $data['tentang'] = Info::where('info', 'TENTANG')->first();
        return view('apps.pages.tentang', $data);
    }

    
}