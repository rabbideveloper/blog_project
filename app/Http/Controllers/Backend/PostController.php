<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhotoUploadController;
use App\Http\Requests\PostCreateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status',1)->pluck('name','id');
        $tags = Tag::where('status',1)->select('name','id')->get();
        return view('backend.modules.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $post_data = $request->except(['slug','tag_ids','photo']);
        $post_data['slug'] = Str::slug($request->input('slug'));
        $post_data['user_id'] = Auth::user()->id;
        $post_data['is_approved'] = 1;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = Str::slug($request->input('slug'));
            $height = 400;
            $width = 1000;
            $thumb_height = 150;
            $thumb_width = 300;
            $path = "image/post/original";
            $thumb_path = "image/post/thumbnail";

            $post_data['photo'] = PhotoUploadController::imageUpload($name, $height, $width, $path,$file);
            PhotoUploadController::imageUpload($name, $thumb_height, $thumb_width,$thumb_path ,$file);


        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
