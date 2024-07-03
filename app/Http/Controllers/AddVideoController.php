<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class AddVideoController extends Controller
{
    public function addvideos(Request $request)
    {
        $name = $request->input('name');
        $desc = $request->input('desc');
        $ext = $request->file('video')->getClientOriginalExtension();
        $ext2 = $request->file('image')->getClientOriginalExtension();
        if ($ext != 'mp4' && ($ext2 != 'jpeg' || $ext2 != 'jpg')) {
            echo 'dsffsdf';
        } else {
            $catid = $request->input('category');
            $origname = $request->file('video')->getClientOriginalName();
            $unicname = time() . '_' . $origname;
            $origname2 = $request->file('image')->getClientOriginalName();
            $unicname2 = time() . '_' . $origname2;
            $request->file('video')->storeAs('public/video', $unicname);
            $request->file('image')->storeAs('public/image', $unicname2);
            Videos::insert(['title' => $name, 'description' => $desc, 'user_id' => Auth::id(), 'categories_id' => $catid, 'videoSRC' => $unicname, 'imageSRC' => $unicname2, 'created_at' => date('y-m-d H:i:s'),]);
            return to_route("main");
        }
    }
    public function showcategory()
    {
        $category = Categories::select('id', 'name')->get();
        return view("addvideo", ['catarr' => $category]);
    }
    public function editmyvid(Request $request)
    {
        print_r($request->all());
        $name = $request->input('name');
        $desc = $request->input('desc');
        $ext = $request->file('vid')->getClientOriginalExtension();
        $ext2 = $request->file('img')->getClientOriginalExtension();
        $vid_id = $request->input('id');
        if ($ext != 'mp4' && ($ext2 != 'jpeg' || $ext2 != 'jpg')) {
            echo 'dsffsdf';
        } else {
            $catid = $request->input('category');
            $origname = $request->file('vid')->getClientOriginalName();
            $unicname = time() . '_' . $origname;
            $origname2 = $request->file('img')->getClientOriginalName();
            $unicname2 = time() . '_' . $origname2;
            $request->file('vid')->storeAs('public/video', $unicname);
            $request->file('img')->storeAs('public/image', $unicname2);
            Videos::where('id', $vid_id)->update(['title' => $name, 'description' => $desc, 'user_id' => Auth::id(), 'categories_id' => $catid, 'videoSRC' => $unicname, 'imageSRC' => $unicname2, 'updated_at' => date('y-m-d H:i:s'),]);
            return redirect()->back();
        }
    }
}
