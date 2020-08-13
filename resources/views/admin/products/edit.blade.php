@extends('layouts.admin')
@section('title', 'Edit A Product')

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('admin_css_js/product/add.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_css_js/product/index.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="main-content">
    @include('partials.content-header', ['name'=>'Product', 'key'=>'Edit'])
    <div class="container-fluid">
    </div>
    <form action="{{ route('product.update', ['id'=>$product->id])}} " method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên Sản Phẩm</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}"
                placeholder="Nhập Tên Sản Phẩm">
        </div>
        <div class="form-group">
            <label>Giá Sản Phẩm</label>
            <input type="text" class="form-control" name="price" value="{{$product->price}}"
                placeholder="Nhập Giá Sản Phẩm">
        </div>
        <div class="form-group">
            <label>Ảnh Đại Diện</label>
            <input type="file" class="form-control-file" name="image_path">
        </div>
        <div class="col-md-12 ">
            <div class="row">
                <img class="product_image_250_150" src="{{$product->image_path}}" alt="">
            </div>
        </div>
        <div class="form-group ">
            <label>Ảnh Chi Tiết</label>
            <input type="file" class="form-control-file" name="images[]" multiple>
        </div>
        <div class="col-md-12 container_images">
            <div class="row">
                @foreach(($product->product_images) as $productImages )
                <div class="col-md-3 container_images_below">
                    <img class = "images_detail" src="{{$productImages->image_path}}" alt="">
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label>Chọn Danh Mục</label>
            <select class="form-control select_init" name="category_id">
                <option value="">Chọn Danh Mục Cha</option>
                {{!!$htmlOption!!}}
            </select>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <select class="form-control tag_select" name="tags[]" multiple="multiple">
                @foreach(($product->tags) as $tagsItem)
                <option value="{{$tagsItem->name}}" selected>{{$tagsItem->name}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control my-editor" name="contents" rows="3">{!!$product ->content!!}</textarea>
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