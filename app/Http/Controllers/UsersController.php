<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\User;

class UsersController extends Controller
{
      
    public function index(){
        return User::with('chanels')->get();
    }

    public function show(User $id){
        return $id->load('chanels');
    }

}
