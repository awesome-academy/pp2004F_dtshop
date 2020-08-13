@extends('layouts.admin')
@section('title', 'Create A New Slider')

@section('css')
<link href="{{ asset('admin_css_js/slider/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="main-content">
    @include('partials.content-header', ['name'=>'Slider', 'key'=>'Add'])
    <div class="container-fluid">
    </div>
    <form action="{{ route('slider.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên Slider</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name='name'
                placeholder="Nhập Tên Slider" value="{{ old('name') }}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Mô tả slider</label>
            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Nhập mô tả"
                name="'description'" id="" cols="30" rows="3"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" class="form-control-file" name="image_path">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
<script src="{{ asset('admin_css_js/slider/add.js') }}"></script>
@section('js')

@endsection