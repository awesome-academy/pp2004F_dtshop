@extends('layouts.admin')
@section('title', 'Create A New Menu')

@section('content')
<div class="main-content">
@include('partials.content-header', ['name'=>'Menus', 'key'=>'Add'])
    <div class="container-fluid">
    </div>
    <form action="{{route('menus.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tên Menu</label>
            <input type="text" class="form-control" name='name' placeholder="Nhập Tên Danh Mục">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Chọn Danh Mục Cha</label>
            <select class="form-control" name='parent_id'>
                <option value="0">Chọn Danh Mục Cha</option>
                {{!! $html !!}}
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection