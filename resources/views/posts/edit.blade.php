@extends('layouts.app') @section('title')Update Page @endsection @section('content')
<form method="POST" action="{{route('posts.index')}}">
  @csrf
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
    <select class="form-control" id="post_creator">
      <option>Marwa</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success">update Post</button>
</form>

@endsection