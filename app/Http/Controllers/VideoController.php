<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Dislike;
use App\Models\User;
use App\Models\Categories;
use App\Models\Like;
use App\Models\Videos;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VideoController extends Controller
{
   
    public function index(){
        return Videos::with('channel')->get();
    }

    public function show($id){ 
        $arr=DB::table('videos')->select('*')->where('id', $id)->get();     
        foreach ($arr as $video){
            $user_id=$video->user_id;
            $category=DB::table('categories')->select('name')->where('id', $video->categories_id)->get();
            foreach ($category as $value) {
                $category_name=$value->name;
            }
        }
        $user=DB::table('users')->select('name')->where('id', $user_id)->get();
        foreach ($user as $user_name){
            $name=$user_name->name;
        }

        $comments=Comment::where('videos_id', $id)->join('users','user_id','=','users.id')->select('users.name', 'comments.*')->get();
        $likes=Like::where('videos_id', $id)->count();
        $dislikes=Dislike::where('videos_id', $id)->count();
        foreach($arr as $ar){
            $dt=Carbon::now();
            $time=$dt->diffForHumans($ar->created_at);
        }

        // print_r($arr);
        $dt=Carbon::now();
        $dt->diffForHumans();

        return view('videos', [
           'arr' => $arr, 
            'name'=> $name,
            'category_name'=>$category_name,
            'comments'=> $comments,
            'likes'=> $likes, 
            'dislike'=> $dislikes,
            'time' => $time
        ]);
    }

    public function myvid($id){
        $arr=DB::table('videos')->select('*')->where('id', $id)->get();     
        foreach ($arr as $video){
            $user_id=$video->user_id;
            $category=DB::table('categories')->select('name')->where('id', $video->categories_id)->get();
            foreach ($category as $value) {
                $category_name=$value->name;
            }
        }
        $user=DB::table('users')->select('name')->where('id', $user_id)->get();
        foreach ($user as $user_name){
            $name=$user_name->name;
        }

        $comments=Comment::where('videos_id', $id)->join('users','user_id','=','users.id')->select('users.name', 'comments.*')->get();
        $likes=Like::where('videos_id', $id)->count();
        $dislikes=Dislike::where('videos_id', $id)->count();
        $category = Categories::select('id', 'name')->get();


        return view('myvid', [
           'arr' => $arr, 
            'name'=> $name,
            'category_name'=>$category_name,
            'comments'=> $comments,
            'likes'=> $likes, 
            'dislike'=> $dislikes,
            'catarr'=>$category
        ]);
    }
}
 