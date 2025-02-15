@extends('layouts.app')

@section('content')
<div class="container">
<!-- <h1>Article List</h1> -->


    <div class="card mb-3">
        <div class="card-body">
        <div class="card-tile">{{ $article['title'] }}</div>
        <div class="card-subtitle mb-2 text-muted small">
            {{ $article->created_at->diffForHumans()  }}
        </div>
            <p class="card-text">
            {{ $article['body'] }}
            </p>
  

            <a class="btn btn-warning"
                href="{{ url("/articles/delete/$article->id") }}">
                Delete
            </a>
        </div>
    </div>

    <h1>Comment : ({{ count($article->comments) }})</h1>

    <div class="card p-3">
        @foreach($article->comments as $comment )
            <div class="card mb-2">
                <div class="card-body">
                <p class="card-text"> {{$comment->content}} </p>
                </div>
            </div>
        @endforeach
        
        
       
        <form  method="POST" action='{{route("comments.store")}}' >
         @csrf
            
        <div class="mb-3">
            <label for="content" class="form-label">Comment</label>
            <textarea name="content" class="form-control"></textarea>
        </div>

        <input type="hidden" name="article_id" value="{{$article->id}}"> 

        <input type="submit" value="Comment" class="btn btn-primary">
        </form>
    </div>

 


</div>

@endsection



