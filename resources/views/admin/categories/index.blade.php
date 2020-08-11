@extends('layouts.admin')
@section('title', 'All Categories')

@section('content')
<div class="main-content">
    @include('partials.content-header', ['name'=>'Categories', 'key'=>'List'])
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card-header">
                <a href="{{ route('categories.create')}}" class="btn btn-success float-right m-2">Add</a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{!! $category->id !!}</th>
                <td>{!! $category->name !!}</td>
                <td>
                    <a href="{{route('categories.edit', ['id'=>$category->id])}}" class="btn btn-default">Edit</a>
                    <a href="{{route('categories.delete', ['id'=>$category->id])}}" class="btn btn-default">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-md-12">
    {{ $categories->links() }}
    </div>
   
</div>

@endsection