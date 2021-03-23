<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// // use App\Http\Controllers\Resources\PostResource;
// use App\Http\Controllers\Resources\PostResource;
// use App\Models\Post;
// use App\Models\User;
// use App\Http\Controllers\Api\StorePostRequest;


use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        // dd('we are in index');
        // $posts =Post::all();
        //Eager Loading idea  Post with table make relation with it 
        // $posts = Post::with('users')->paginate(4);
        //Pagination idea 
        $posts = Post::paginate(4);
        //in index.php
        // {{$posts->links("pagination::bootstrap-4")}}

        return PostResource::collection($posts);
    }


    // public function show(Post  $post)
    // {
    //     return new PostResource($post);
    // }
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    // public function store(StorePostRequest $request)
    // {
    //     dd('we are in store');
    //     $post= Post::create($request->all());
    //     return new PostResource($post);
    // }


    public function store(StorePostRequest $request)
    {
        // dd('we are in store');

        $post = Post::create($request->all());

        return new PostResource($post);
    }
}