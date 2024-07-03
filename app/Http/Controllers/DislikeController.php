<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Dislike;
use App\Models\Like;

class DislikeController extends Controller
{
    public function dislikeadd(Request $request)
    {
        $dislike = Dislike::select('id')->where('user_id', Auth::user()->id)->whereAll(['videos_id'], '=', $request->id_dislike)->first();
        
        $like = Like::select('id')->where('user_id', Auth::user()->id)->whereAll(['videos_id'], '=', $request->id_dislike)->first();
        if (isset($dislike)) {
            Dislike::where('user_id', Auth::user()->id)->whereAll(['videos_id'], '=', $request->id_dislike)->delete();
            return to_route('videos', $request->id_dislike);
        } else if (isset($like)) {
            Like::where('user_id', Auth::user()->id)->whereAll(['videos_id'], '=', $request->id_dislike)->delete();
            Dislike::insert([
                'user_id' => Auth::user()->id,
                'videos_id' => $request->id_dislike
            ]);
            return to_route('videos', $request->id_dislike);
        } else {
            Dislike::insert([
                'user_id' => Auth::user()->id,
                'videos_id' => $request->id_dislike
            ]);
            return to_route('videos', $request->id_dislike);
        }
    }
}
