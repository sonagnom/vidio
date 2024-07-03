<?php

namespace App\Http\Controllers;
use App\Models\Videos;
use Illuminate\Support\Facades\DB;
use Auth;

class ShowVideosController extends Controller
{ 
    public function show()
    {
        $arr=DB::table('videos')->select('*')->limit(10)->get();
        return view('main', [
            'arr' => $arr
        ]);
    }

    public function myvideos()
    {
        $arr=Videos::where('user_id', Auth::user()->id)->join('categories', 'categories_id', '=', 'categories.id')->select('videos.*', 'categories.name')->get();
        return view('myvideos', [
            'arr' => $arr
        ]);
    }
}
