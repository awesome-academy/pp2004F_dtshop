@extends('layouts.admin')
@section('title', 'Edit Slider')

@section('css')
<link href="{{ asset('admin_css_js/slider/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="main-content">
    @include('partials.content-header', ['name'=>'Slider', 'key'=>'Add'])
    <div class="container-fluid">
    </div>
    <form action="{{ route('slider.update', ['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên Slider</label>
            <input type="text" class="form-control" name="name" value="{{ $slider->name }}"
                placeholder="Nhập Tên Slider">
        </div>
        <div class="form-group">
            <label>Mô tả slider</label>
            <textarea class="form-control" name="description" rows="3">{!!$slider->description!!}</textarea>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" class="form-control-file" name="image_path">
        </div>
        <div class="col-md-12 ">
            <div class="row">
                <img class="product_image_250_150" src="{{$slider->image_path}}" alt="">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
<script src="{{ asset('admin_css_js/slider/add.js') }}"></script>
@section('js')

@endsection