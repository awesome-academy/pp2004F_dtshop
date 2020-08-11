@extends('layouts.admin')
@section('title', 'Create A New Category')

@section('content')
<div class="main-content">
@include('partials.content-header', ['name'=>'Categories', 'key'=>'Add'])
    <div class="container-fluid">
    </div>
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tên Danh Mục</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='name'
                placeholder="Nhập Tên Danh Mục">
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