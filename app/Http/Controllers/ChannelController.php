<?php

namespace App\Http\Controllers;
use App\Models\Channels;

class ChannelController extends Controller
{
    public function index(){
       return Channels::with('videos')->with('user')->get();
    }

    public function show(Channels $id){
        return $id->load('videos')->load('user');
    }
}
