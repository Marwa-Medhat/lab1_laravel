@extends('layouts.app') @section('title')Index Page @endsection @section('content')
<a href="{{route('posts.create')}}" class="btn btn-success" style="margin-bottom: 20px;">Create Post</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">slug</th>

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
      <!-- <td>{{ $post['created_at'] }}</td> -->
      <td> {{Carbon\Carbon::parse($post->created_at)->Format('Y-m-d')}} </td>
      <td> {{ $post['slug'] }} </td>
      <td>
        <x-button type=info : href="{{ route('posts.show',['post' => $post['id']])}}" : text="View" />
        <x-button type=secondary : href="{{ route('posts.edit',['post' => $post['id']])}}" : text="Edit" />
        <!-- <x-button type=danger : href="{{ route('posts.destory',['post' => $post['id']])}}" : text="Delete" /> -->

        <button type="button" class="btn btn-success show-ajax" data-toggle="modal" data-target="#ajax_view" data-ajax="{{$post->id}}">AJView</button>

        <form method="POST" action="{{ route('posts.destory',['post' => $post['id']])}}" style="display:inline;margin:0px;padding:0px">
          @csrf @method('DELETE')
          <button class="btn btn-danger" style="margin-bottom:20px;" onclick="return confirm('Are you sure you want to delete ?')">Delete</button>
        </form>

        <!-- {{$posts->links("pagination::bootstrap-4")}} -->

      </td>
    </tr>
    @endforeach
  </tbody>


  <!-- <nav aria-label="Page navigation example">
    <ul class="pagination"  >
      <li class="page-item">
        <a class="page-link">Previous</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="{{ route('posts.index',['post' => $post['id']])}}">1</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="{{ route('posts.index',['post' => $post['id']])}}">2</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="{{ route('posts.index',['post' => $post['id']])}}">3</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="{{ route('posts.index',['post' => $post['id']])}}">Next</a>
      </li>
    </ul>
  </nav> -->
</table>
{{$posts->links("pagination::bootstrap-4")}}

<div id="ajax_view" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">view post</h4>
        <button type="button" class="close" data-dismiss="modal">x</button>
      </div>
      <div class="modal-body" id="ajax_view_content"></div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('.show-ajax').click(function() {
      console.log($(this).data('ajax'));
      $.ajax({
        url: "{{url('/posts/ajax/show')}}",
        type: 'get',
        data: {
          post: $(this).data('ajax')
        },
        success: function(data) {
          $('#ajax_view_content').html(data);
        }
      });
    });
  });
</script>
@endsection