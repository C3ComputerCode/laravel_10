@extends('layouts.app')

@section('content')
<div class="container">
<!-- <h1>Article List</h1> -->
@if(session('info'))
 <div class="alert alert-info">
 {{ session('info') }}
 </div>
 @endif
 
{{ $articles->links() }}
@foreach($articles as $article)

    <div class="card mb-3">
        <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="card-tile">{{ $article['title'] }}</div>
            <div class=""><a href='{{url("/articles/update/$article->id")}}' class="btn btn-warning">Edit</a></div>
        </div> 

        <div class="card-subtitle mb-2 text-muted small">
            {{ $article->created_at->diffForHumans()  }}
        </div>
            <p class="card-text">
            {{ $article['body'] }}
            </p>
            <a class="btn" href='{{ url("/articles/detail/$article->id") }}'>
            View Detail  &raquo;
             </a>
        </div>
    </div>

 
    
   @endforeach 

</div>

@endsection



