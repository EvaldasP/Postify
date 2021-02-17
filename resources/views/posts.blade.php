@extends('layouts.app')


@section('content')


    <div class="form-group">
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            <label for="comment">Post:</label>
            <textarea class="form-control" rows="5" id="post" name="post"></textarea>
            <button type="submit"class="btn btn-primary">Post</button>
        </form>
    </div>


    @foreach ($posts as $post)
        <div class="media border p-3">
            <img src="img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
            <div class="media-body">
              <h4>{{$post->user->username}}<small><i> Posted on February 19, 2016</i></small></h4>
              <p>{{$post->post}}</p>
              @if ($post->user->id == auth()->id())
                <a href="#" class="card-link">delete</a>
                <a href="#" class="card-link">update</a>
              @endif
            </div>
          </div>
    @endforeach

@endsection