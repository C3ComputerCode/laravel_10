@extends('layouts.app')

@section('content')
<div class="container">
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->
    <form method="post">
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value='{{old("name")}}'>
            
        </div>
        @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Category Create" class="btn btn-primary">
    </form>
    
</div>

@endsection



