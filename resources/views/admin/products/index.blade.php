@extends('layouts.admin')
@section('title', 'All Products')


@section('css')
<link href="{{ asset('admin_css_js/product/index.css') }}" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('admin_css_js/product/index.js') }}"></script>
@endsection

@section('content')
<div class="main-content">
    @include('partials.content-header', ['name'=>'Products', 'key'=>'List'])
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card-header">
                <a href="{{ route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{!! $product->id !!}</th>
                <td>{!! $product->name !!}</td>
                <td>{{ number_format($product->price) }}</td>
                <td>
                    <img class="product_image_150_100" src="{{ $product->image_path }}" alt="">
                </td>
                <td>{{ optional($product->category)->name }}</td>
                <td>
                    <a href="{{ route('product.edit', ['id'=>$product->id]) }}" class="btn btn-default">Edit</a>
                    <a href="" 
                    data-url = "{{ route('product.delete', ['id'=>$product->id])}}" class="btn btn-default action_delete">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-md-12">
        {{ $products->links() }}
    </div>

</div>

@endsection