@extends('layouts.admin')
@section('title', 'Create A New Product')

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('admin_css_js/product/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="main-content">
    @include('partials.content-header', ['name'=>'Product', 'key'=>'Add'])
    <div class="container-fluid">
    </div>
    <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên Sản Phẩm</label>
            <input type="text" class="form-control" name='name' placeholder="Nhập Tên Sản Phẩm">
        </div>
        <div class="form-group">
            <label>Giá Sản Phẩm</label>
            <input type="text" class="form-control" name='price' placeholder="Nhập Giá Sản Phẩm">
        </div>
        <div class="form-group">
            <label>Ảnh Đại Diện</label>
            <input type="file" class="form-control-file" name='image_path'>
        </div>
        <div class="form-group">
            <label>Ảnh Chi Tiết</label>
            <input type="file" class="form-control-file" name="images[]" multiple>
        </div>
        <div class="form-group">
            <label>Chọn Danh Mục</label>
            <select class="form-control select_init" name='category_id'>
                <option value="">Chọn Danh Mục Cha</option>
                {{!!$htmlOption!!}}
            </select>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <select class="form-control tag_select" name="tags[]" multiple="multiple"></select>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control my-editor" name='contents' rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{ asset('admin_css_js/product/add.js') }}"></script>
@endsection