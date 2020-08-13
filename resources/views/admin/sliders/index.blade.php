@extends('layouts.admin')
@section('title', 'All Sliders')

@section('css')
<link href="{{ asset('admin_css_js/slider/index.css') }}" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('admin_css_js/product/index.js') }}"></script>
@endsection

@section('content')
<div class="main-content">
    @include('partials.content-header', ['name'=>'Slider', 'key'=>'List'])
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card-header">
                <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">Add</a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $slider)
            <tr>
                <th scope="row">{{ $slider->id }}</th>
                <td> {{ $slider->name }} </td>
                <td> {{ $slider->description }} </td>
                <td>
                    <img class="product_image_150_100" src="{{ $slider->image_path }}" alt="">
                </td>
                <td>
                    <a href="{{ route('slider.edit', ['id'=>$slider->id]) }}" class="btn btn-default">Edit</a>
                    <a href="" data-url="{{ route('slider.delete', ['id'=>$slider->id]) }}"
                        class="btn btn-default action_delete">Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="col-md-12">
        {{ $sliders->links() }}
    </div>
</div>

@endsection