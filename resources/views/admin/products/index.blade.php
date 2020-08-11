@extends('layouts.admin')
@section('title', 'List Product')

@section('content')
<div class="main-content">
    @include('partials.content-header', ['name'=>'Products', 'key'=>'List'])
    <div class="main-content">
        <div class="col-md-12">
            <div class="card-header">
                <a href="{{ route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="checkbox p-0">
                                            <input id="selectable1" type="checkbox" class="checkAll" name="checkAll">
                                            <label for="selectable1"></label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <input id="selectable2" type="checkbox">
                                            <label for="selectable2"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title">#</span>
                                                    <span class="sub-title">#</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-pill badge-gradient-success">#</span></td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td class="text-center font-size-18">
                                        <a href="#" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
                                        <a href="#" class="text-gray"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection