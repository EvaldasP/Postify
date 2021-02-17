@extends('layouts.app')

@section('content')


<div class="form-group">
    <form action="{{route('post.update', $post->id)}}" method="POST">
        @csrf @method('PUT')
        <label for="comment">Post:</label>
        <textarea class="form-control" rows="5" id="post" name="post">{{$post->post}}</textarea>
        <button type="submit"class="btn btn-primary">Edit</button>
    </form>
</div>

@endsection