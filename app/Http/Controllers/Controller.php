<?php

namespace App\Http\Controllers;

use App\Parcours;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){

        $experiences =  Parcours::where('type','like','experience')->orderByRaw('start_date DESC')->get();
        $educations =  Parcours::where('type','like','education')->orderByRaw('start_date DESC')->get();


        return view('front.index',['experiences'=>$experiences , 'educations'=>$educations]);

    }
}
