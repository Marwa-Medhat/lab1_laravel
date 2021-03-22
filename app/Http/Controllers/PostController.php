<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use Validator;

class PostController extends Controller
{
    public function index()
    {
        //Login to make sure user is authorized
        $allPosts = Post :: all();
        // dd($allPosts);

        $Posts = Post ::paginate(4);
        // dd($posts);
        // return view('posts.index', [
        //      'posts' => DB::table('posts')->paginate(15)
        // ]);
        // dd($Posts);
           return view('posts.index', [
            'posts' => $Posts,
        ]);

        // return view('posts.index', [
        //     'posts' => $allPosts,
        // ]);
   
    }
    public function show($postId)
    {
        $post = Post :: find ($postId);

        return view('posts.show', [
            'post' => $post,'users' => User::all()
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

    public function store(StorePostRequest $request)
    {
        // $post = new Post;
        // $user=new User;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();
        // return redirect()->route('posts.index');

        // $request->validate(
        //     [
        //         'title'=>['required','min:3'],
        //         'description'=>['required','min:3'],
            
        //     ],
        //     [
        //       'title.required'=>'show this message', 
        //       'title.min'=>'override min validation rule default message',  
        //     ]
        //     );
        $post = new Post;
        $user=new User;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id=$request->user_id;
        // $post->posted_by=$request->user_id;
    //    dd( \Carbon\Carbon::parse($post->posted_by, 'd/m/Y H:i:s')->isoFormat('ddd Do \of MMMM YYYY, h:mm:ss a'));
    // dd( Carbon::createFromFormat('Y-m-d H:i:s', $post->created_by)->format('d-m-Y'));
        $post->save();
        return redirect()->route('posts.index');
    }

  

    public function edit($postId)
    {
        //logic to insert request data into db
       
        $post = Post :: find ($postId);

        return view('posts.edit', [
            'post' => $post, 'users' => User::all()
        ]);
    }
    // UpdatePostRequest
    public function update(UpdatePostRequest $request,$postId)
    {
        //logic to insert request data into db
        // $post = new Post;
        // $user=new User;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->user_id=$request->user_id;
        // $post->save();
        // return redirect()->route('posts.index');

        // dd($postId);
        
        $post = Post::find($postId);
        $post->title = $request->title;
        $post->description=$request->description;
        $post->user_id=$request->user_id;
        $post->save();
       return redirect()->route('posts.index');

    }



    public function destory($postId)
    {

        // ------------------------------------------
        Post::find($postId)->delete();
        return redirect()->route('posts.index');

    }


    public function ajaxShow(Request $request)
    {
        $post = Post::withTrashed()->where("id", $request->post)->first();
        return view('posts.ajax_show', compact('post'));
    }
}