<?php

namespace App\Http\Controllers\Facebook;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contracts\FacebookInterface;

class FacebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fbLogin(FacebookInterface $facebook_service)
    {
        return redirect($facebook_service->getLoginUrl());     
    }

    public function callback(FacebookInterface $facebook_service)
    {
        if($facebook_service->loginOrRegister()){
            return redirect('/');
        } else {
            return redirect('/')->with('warning', 'Error Authentication');
        }
    } 


}
