<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = [
            ['id' => 1, 'title' => 'laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20','email'=>'Ahmed@gmail.com'],
            ['id' => 2, 'title' => 'PHP', 'posted_by' => 'Mohamed', 'created_at' => '2021-04-15','email'=>'Mohamed@gmail.com'],
            ['id' => 3, 'title' => 'Javascript', 'posted_by' => 'Ali', 'created_at' => '2021-06-01','email'=>'Ali@gmail.com'],
        ];

        return view('posts.index', [
            'posts' => $allPosts
        ]);
    }

    public function show($postId)
    {
        $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20','email'=>'Ahmed@gmail.com'];

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //logic to insert request data into db

        return redirect()->route('posts.index');
    }

    public function edit()
    {
        //logic to insert request data into db
        $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'];

        return view('posts.edit', [
            'post' => $post,
        ]);

    }
    public function update()
    {
        //logic to insert request data into db

        return redirect()->route('posts.index');
    }
}
