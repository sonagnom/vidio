<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Dislike;
use Auth;

class LikeController extends Controller
{
    public function likeadd(Request $request)
    {
        $like = Like::select('id')->where('user_id', Auth::user()->id)->whereAll(['videos_id'], '=', $request->id_like)->first();
        $dislike = Dislike::select('id')->where('user_id', Auth::user()->id)->whereAll(['videos_id'], '=', $request->id_like)->first();
        print_r($like);


        if (isset($like)) {
            Like::where('user_id', Auth::user()->id)->whereAll(['videos_id'], '=', $request->id_like)->delete();
            return to_route('videos', $request->id_like);
        } 
        
        else if(isset($dislike)) {
            Dislike::where('user_id', Auth::user()->id)->whereAll(['videos_id'], '=', $request->id_like)->delete();

            Like::insert([
                'user_id' => Auth::user()->id,
                'videos_id' => $request->id_like
            ]);
            return to_route('videos', $request->id_like);
        }

        else {
           
            Like::insert([
                'user_id' => Auth::user()->id,
                'videos_id' => $request->id_like
            ]);
            return to_route('videos', $request->id_like);
           
        }
    }
}

