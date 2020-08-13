@extends('layouts.admin')
@section('title', 'List Discount')

@section('content')
    <div class="main-content">
        @include('partials.content-header', ['name'=>'Discount', 'key'=>'Add'])

        <div class="container col-md-8 col-md-offset-2 mt-5">
            <div class="card">
                <div class="card-header ">
                    <h1 class="float-left">Discount List</h1>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12">
                    <div class="card-header">
                        <a href="{{route('create_discount')}}" class="btn btn-success float-right m-2">Create
                            Discount</a>
                    </div>
                </div>
                <div class="card-body mt-2">
                    @if ($discounts->isEmpty())
                        <p> There is no discount.</p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Discount Code</th>
                                <th>Discount</th>
                                <th>Expiration Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($discounts as $discount)
                                <tr>
                                    <td>{{ $discount->id }} </td>
                                    <td>
                                        {{ $discount->code }}
                                    </td>
                                    <td>{{ $discount->discount }}</td>
                                    <td>{{ $discount->expiration_date }}</td>
                                    <td>
                                        <a href="{{ action('DiscountController@destroy', $discount->id) }}"
                                           class="btn btn-info">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                {{ $discounts->links() }}
            </div>
        </div>
    </div>

@endsection
