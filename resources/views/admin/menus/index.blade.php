@extends('layouts.admin')
@section('title', 'All Menus')

@section('content')
<div class="main-content">
    @include('partials.content-header', ['name'=>'Menus', 'key'=>'List'])
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card-header">
                <a href="{{ route('menus.create')}}" class="btn btn-success float-right m-2">Add</a>
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
            @foreach ($menus as $menu)
            <tr>
                <th scope="row">{!! $menu->id !!}</th>
                <td>{!! $menu->name !!}</td>
                <td>
                    <a href="{{ route('menus.edit', ['id'=> $menu->id ]) }}" class="btn btn-default">Edit</a>
                    <a href="{{ route('menus.delete', ['id'=>$menu->id]) }}" class="btn btn-default">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-md-12">
        {{ $menus->links() }}
    </div>
</div>

@endsection