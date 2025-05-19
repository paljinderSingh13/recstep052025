<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignController extends Controller
{
    
    public function players()
    {
        //
        return view('design.players');
    }
    public function playerform()
    {
        //
        return view('design.playerform');
    }
    

    public function forgotpassword()
    {
        //
        return view('design.forgotpassword');
    }  

    public function resetpassword()
    {
        //
        return view('design.resetpassword');
    }
    public function newpassword()
    {
        //
        return view('design.newpassword');
    }
    public function forgotemaildesign()
    {
        //
        return view('design.forgotemaildesign');
    }
    public function resetlink()
    {
        //
        return view('design.resetlink');
    }
    public function schedule()
    {
        //
        return view('design.schedule');
    }
}
