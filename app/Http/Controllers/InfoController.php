<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
class InfoController extends Controller
{
    //
    public function index($info){
        $data['title'] = ucfirst($info) . " Covid-19";
        if ($info == 'developer') {
            $data['title'] = "Tentang " . ucfirst($info);
        }
        $data['info'] = Info::where('info', strtoupper($info))->first();
        return view('apps.pages.info', $data);
    }

    
}