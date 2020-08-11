@extends('layouts.admin')
@section('title', 'Edit Menu')

@section('content')
<div class="main-content">
@include('partials.content-header', ['name'=>'Menus', 'key'=>'Edit'])
    <div class="container-fluid">
    </div>
    <form action="{{ route('menus.update', ['id'=>$menu->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tên Menu</label>
            <input type="text" class="form-control" name='name' value="{{$menu->name}}" placeholder="Nhập Tên Danh Mục" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Chọn Danh Mục Cha</label>
            <select class="form-control" name='parent_id'>
                <option value="0">Chọn Danh Mục Cha</option>
                {{!! $selected !!}}
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection