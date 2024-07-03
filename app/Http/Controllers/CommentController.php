<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    public function addcomments(Request $request)
    {
        Comment::insert([
            "text" => $request->text,
            "user_id" => Auth::user()->id,
            "videos_id" => $request->video_id,
        ]);
        return to_route('videos', $request->video_id);
    }

    public function editcomment(Request $request)
    {
        Comment::where('id', $request->editid)->update(['text' => $request->editcom]);
        return redirect()->back();
    }


    public function deletecomment(Request $request)
    {
        Comment::where('id', $request->editid)->delete();
        return redirect()->back();
    }
}
