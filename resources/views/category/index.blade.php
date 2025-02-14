@extends('layouts.app')

@section('content')
<div class="container">
<!-- <h1>Article List</h1> -->
@if(session('info'))
 <div class="alert alert-info">
 {{ session('info') }}
 </div>
 @endif
 
   <table class="table">
        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Control</th>
        </tr>
       
        @foreach($categories as $category)
            <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td> <a href='{{url("/category/update/$category->id")}}' class="btn btn-warning">Edit</a>
                        <a href='{{url("/category/delete/$category->id")}}' class="btn btn-danger">Delete</a>
                    </td>
            </tr>
        @endforeach 
        
   </table>

</div>

@endsection



