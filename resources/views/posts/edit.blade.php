@extends('layouts.app') @section('title')Update Page @endsection @section('content')
<form method="POST" action="{{ route('posts.update',['post' => $post['id']])}}">
  <input type="hidden" name="_method" value="put" /> @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input name='title' value="{{$post->title}}" type="text" class="form-control" id="title" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea name='description' class="form-control" id="description">"{{$post->descrription}}"</textarea>
  </div>
  <div class="form-group">
    <label for="post_creator">Post Creator</label>
    <select name="user_id" class="form-control" id="post_creator">
      @foreach ($users as $user)
      <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
  </div>

  <input type="submit" class="btn btn-success" value="Update Post">
</form>

@endsection