@extends('layouts.app') @section('title')Create Page @endsection @section('content') @if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="POST" action="{{route('posts.store')}}">
  @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input name='title' type="text" class="form-control" id="title" aria-describedby="emailHelp">
  </div>
  <!-- <div class="form-group">
    <label for="slug">slug</label>
    <input name='slug' type="text" class="form-control" id="slug">
  </div> -->
  <div class="form-group">
    <label for="description">Description</label>
    <textarea name='description' class="form-control" id="description"> </textarea>
  </div>
  <div class="form-group">
    <label for="post_creator">Post Creator</label>
    <select name="user_id" class="form-control" id="post_creator">
      @foreach ($users as $user)
      <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-success">Create Post</button>
</form>

@endsection @section('scripts')
<script>
  $('#title').change(function(e) {
    $.get("{{url('/posts/ajax/show')}}", {
        'title': $(this).val()
      },
      function(data) {
        $('#slug').val(data.slug);
      }
    );
  });
</script>
@endsection