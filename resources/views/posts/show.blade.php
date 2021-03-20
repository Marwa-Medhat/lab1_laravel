@extends('layouts.app')

@section('title')Show Page @endsection

@section('content')
<div class="card">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <span class="card-title font-weight-bold h5 inline" >Title:</span>
      <span class="card-text">{{ $post['title'] }}</span>
      <br>
      <h5 class="card-title font-weight-bold" >Description:</h5>
      <p class="card-text">{{ $post['description'] }}</p>
    </div>
</div>

<div style="margin-bottom: 20px;"> </div>

<div class="card m-10px" >
    <div class="card-header" > 
      Post Creater Info
    </div>
    <div class="card-body">
      <span class="card-title font-weight-bold h5 inline"  >Name:</span>
      <span class="card-text">{{ $post['posted_by'] }}</span>
      <br>
      <span class="card-title font-weight-bold h5 inline" >Email:</span>
      <span class="card-text">{{ $post['email'] }}</span>
    <br>
      <span class="card-title font-weight-bold h5 inline">Created At:</span>
      <span class="card-text">{{ $post['created_at'] }}</span>
    <br>
    </div>
</div>
@endsection
