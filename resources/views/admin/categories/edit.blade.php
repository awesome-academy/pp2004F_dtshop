@extends('layouts.admin')
@section('title', 'Edit A Category')

@section('content')
<div class="main-content">
@include('partials.content-header', ['name'=>'Categories', 'key'=>'Edit'])
    <div class="container-fluid">
    </div>
    <form action="{{route('categories.update', ['id'=>$category->id])}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tên Danh Mục</label>
            <input type="text" class="form-control" name='name' value="{{$category->name}}" placeholder="Nhập Tên Danh Mục">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Chọn Danh Mục Cha</label>
            <select class="form-control" id="exampleFormControlSelect1" name='parent_id'>
                <option value="0">Chọn Danh Mục Cha</option>
                {{!!$htmlOption!!}}
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection