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

    <div class="card p-3">
        <div class="card-title">Comment List</div>
        <form action="">
        <div class="mb-3">
            <label for="content" class="form-label">Comment</label>
            <textarea name="content" class="form-control"></textarea>
        </div>
        <input type="submit" value="Comment" class="btn btn-primary">
        </form>
    </div>

 


</div>

@endsection



