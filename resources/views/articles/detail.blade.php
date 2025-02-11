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

 


</div>

@endsection



