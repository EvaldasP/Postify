@extends('layouts.app')


@section('content')


    <div class="form-group">
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            <label for="comment"><h3>Post:</h3></label>
            <textarea class="form-control" rows="5" id="post" name="post"></textarea>
            <button type="submit"class="btn btn-primary">Post</button>
        </form>
    </div>


    @foreach ($posts as $post)
        <div id="postas" class="media border p-3">
            <img src="img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
            <div class="media-body">
              <h4>{{$post->user->username}}<small><i> Posted  {{$post->created_at->diffForHumans()}}</i></small></h4>
              <p>{{$post->post}}</p>
            @if($post->ownedBy(auth()->user()))
                    <form action="{{route('post.destroy', $post->id)}}" method="post">
                        @csrf @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Trinti"/>
                        <a class="btn btn-primary" href="{{route('post.edit', $post->id)}}">edit</a>
                    </form>
              @endif
            </div>
                <div class="wrapper">
                    <div id="likeUnlike" class="">
                        @if(!$post->likedBy(auth()->user()))
                            <form action="{{route('post.like', $post->id)}}" method="post" >
                            @csrf
                            <button type="submit">👍</button>
                            </form>
                        @else
                            <form action="{{route('post.delete', $post->id)}}" method="post" >
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="">👎</button>
                            </form>
                        @endif
                    </div>
                    <span>Post Liked {{$post->likes->count()}}</span>
                </div>
        </div>       
    @endforeach
    <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>
@endsection