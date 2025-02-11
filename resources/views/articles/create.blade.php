@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post">
    @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="">Category</label>
            <select class="form-select" name="category_id">
                <option value="">Choose a Category</option>
                @foreach($categories as $category)
                    <option value='{{ $category["id"] }}'>{{$category["name"]}}</option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Post Create" class="btn btn-primary">
    </form>
    
</div>

@endsection



