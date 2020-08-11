@extends('layouts.admin')
@section('title', 'List Discount')

@section('content')


<div class="container col-md-8 col-md-offset-2">
    <div class="card mt-5">
        <div class="card-header ">
            <h1 class="float-left">Create Discount </h1>
            <div class="clearfix"></div>
        </div>
        <div class="card-body mt-2">
            <form method="post" action{{route('create_discount')}} >
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                @csrf
                <fieldset>
                    <div class="form-group">
                        <label for="code" class="col-lg-2 control-label">code</label>
                        <div class="col-lg-10">
                            <input type="text" name="code" class="form-control"  placeholder="Nhập mã code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="discount" class="col-lg-2 control-label">Discount </label>
                        <div class="col-lg-10">
                            <input type="integer" name="discount" class="form-control"  placeholder="Nhập giá giảm">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="expiration_date" class="col-lg-2 control-label">Expiration Date</label>
                        <div class="col-lg-10">
                            <input type="datetime-local" name="expiration_date" class="form-control"  placeholder="Nhập ngày hết hạn">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection