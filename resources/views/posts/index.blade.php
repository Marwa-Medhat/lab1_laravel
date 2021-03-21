@extends('layouts.app') @section('title')Index Page @endsection @section('content')
<a href="{{route('posts.create')}}" class="btn btn-success" style="margin-bottom: 20px;">Create Post</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $post['id'] }}</th>
      <td>{{ $post['title'] }}</td>
      <td>{{ $post->user ? $post->user->name : 'user not found' }}</td>
      <!-- <td>{{ $post['posted_by'] }}</td> -->
      <td>{{ $post['created_at'] }}</td>
      <td>
        <x-button type=info : href="{{ route('posts.show',['post' => $post['id']])}}" : text="View" />
        <x-button type=secondary : href="{{ route('posts.edit',['post' => $post['id']])}}" : text="Edit" />
        <x-button type=danger : href="{{ route('posts.destory',['post' => $post['id']])}}" : text="Delete" />
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection