<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CategotiesController extends Controller
{
    public function index(){
        return Categories::get();
    }

    public function show(Categories $id){
        return $id;
    }
}

