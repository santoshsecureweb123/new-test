@extends('layouts.app')

@section('content')
        
<div class="container">
    <div class="card-header">Dashboard</div>
    @if(Session::has('success'))
    {{ Session::get('success')}}
    @endif
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <form method="post" action="/post_insert">
     @csrf
    <div class="card-body">
        <label for="post_title"><b>Post Title</b></label>
        <input type="text" placeholder="Ente Post Title" name="post_title"  >
        @if($errors->has('post_title')){{ $errors->first('post_title') }}@endif
    </div>
    <div class="card-body">
        <label for="post_description"><b>Post Description</b></label>
        <textarea rows="3" cols="40" name="post_description" ></textarea>
          @if($errors->has('post_description')){{ $errors->first('post_description') }}@endif
    </div>
        <button type="submit" class="registerbtn">Submit</button>
    </form>

</div>
@endsection




