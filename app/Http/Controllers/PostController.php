<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Admin;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('multiauth::posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('multiauth::posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogInput  = $request->except('p_image');
        $image = $request->p_image;

        if($image){
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).time().'.png'; 
            \File::put(public_path('images/post'). '/' . $imageName, base64_decode($image));           

            $blogInput['p_image'] = $imageName;
        }

        Post::create($blogInput);

        return redirect(route('admin.posts'))->with('message', 'New Post is stored successfully '.$imageName);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $admin = Admin::where('name', '==', $post->p_author);
        return view('multiauth::posts.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        
        $categories = Category::all();
        return view('multiauth::posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request)
    {
        $blogInput  = $request->except('p_image');
        $image = $request->p_image;           
        
        if (strlen($image ) < 1222){
            $blogInput['p_image'] = $request->p_image;
        }else{
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).time().'.png'; 
            \File::put(public_path('images/post'). '/' . $imageName, base64_decode($image));           

            $blogInput['p_image'] = $imageName;
        }
        $post->update($blogInput);
        return redirect(route('admin.posts'))->with('message', 'You have  updated Post successfully'.$request->p_image);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('message', 'You have deleted Post successfully');
    }
}


