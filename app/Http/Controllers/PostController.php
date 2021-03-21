<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post :: all();
        // dd($allPosts);

        return view('posts.index', [
            'posts' => $allPosts,
        ]);
   
        }
    public function show($postId)
    {
        $post = Post :: find ($postId);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    // public function create()
    // {
    //     return view('posts.create');
    // }
    public function create()
    {
    return view('posts.create', ['users' => User::all()]);
    }

    public function store(Request $request)
    {
        // $post = new Post;
        // $user=new User;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();
        // return redirect()->route('posts.index');


        $post = new Post;
        $user=new User;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id=$request->user_id;
        // $post->posted_by=$request->user_id;
        $post->save();
        return redirect()->route('posts.index');
    }

  

    public function edit($postId)
    {
        //logic to insert request data into db
        // ['users' => User::all()]
        $post = Post :: find ($postId);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request)
    {
        //logic to insert request data into db
        // $post = new Post;
        // $user=new User;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();
        // return redirect()->route('posts.index');




        $post = Post::find($postID);
 $post->title = $request->title;
 $post->description=$request->description;
 $post->user_id=$request->user_id;
 $post->save();
 return redirect()->route('posts.index');
    }
}