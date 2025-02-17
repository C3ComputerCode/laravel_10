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

    @if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
    @endif

    <h1>Comment : ({{ count($article->comments) }})</h1>

    <div class="card p-3">
        @foreach($article->comments as $comment )
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between">
                <p class="card-text"> {{$comment->content}} </p>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#commentEdit{{$comment->id}}">
                        Edit
                    </button>

                    <!-- Modal -->
    <div class="modal fade" id="commentEdit{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Comment Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <form action='{{route("comments.update",$comment->id)}}' method="POST">
                    @csrf
                    @method("PUT")
                     <div class="mb-3">
                     <textarea name="content" id="" class="form-control"> {{$comment->content}} </textarea>
                     </div>
                     <input type="hidden" name="article_id" value="{{$article->id}}">

                     <div class="mb-3">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <input type="submit" value="Comment Updated" class="btn btn-primary">
                     </div>
                    </form>
                   
                </div>
                
            </div>
        </div>
    </div>

                    <!-- <a href='{{route("comments.edit",$comment->id)}}' class=" btn btn-sm btn-warning"
                        data-bs-toggle="modal" data-bs-target="#commentEdit{{ $comment->id }}">Edit</a> -->
                    <form action='{{route("comments.destroy",$comment->id)}}' method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Del" class="btn btn-sm btn-danger">
                    </form>
                </div>
            </div>
        </div>


        

        @endforeach



        <form method="POST" action='{{route("comments.store")}}'>
            @csrf

            <div class="mb-3">
                <label for="content" class="form-label">Comment</label>
                <textarea name="content" class="form-control"></textarea>
            </div>

            <input type="hidden" name="article_id" value="{{$article->id}}">

            <input type="submit" value="Comment" class="btn btn-primary">
        </form>
    </div>

    <!-- Button Edit modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

    



</div>

@endsection