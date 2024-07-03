<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Videos;
use DB;
use Illuminate\Http\Request;

class ShowAdminController extends Controller
{
    public function showvideos(){
        $arr=DB::table('videos')->select('*')->get();
        $arrcat=Categories::select('*')->get();
        return view('admin', [
            'arr' => $arr,
            'arrcat' => $arrcat
        ]);
    }


    public function deletecat(Request $request){
        Categories::where('id', $request->id)->delete();
        return to_route("admin");
    }

    public function editvideo(Request $request){
        Videos::where("id", $request->id_vid)->update(['status'=>$request->status]);
        return to_route("admin");
    }


    public function admincat(Request $request){
       $namecat=$request->input('namecat');
       Categories::insert(['name'=> $namecat]);
       return to_route("admin");
    }
}
