@extends('dashboard.seller.sellerDashboard')

@section('body')
    <style>
    .tb-header{
    color: black;
    font-weight: bold;
    font-size: larger;
    }
    .tb-body{
    color: black;
    font-weight: bold;
    font-size: large;
    }
    </style>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 style="font-size: 70px; font-weight: bold" class="h3 mb-0 text-white">My Orders</h1>
        </div>

        <!-- Content Row -->
        <div class="container-fluid card">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Add ID</th>
                    <th scope="col">Fish Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Order Amount</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $order)
                    @foreach($order['orders']->orders as $od)
                    <tr>
    {{--                    <th scope="row" class="counterCell">1</th>--}}
                        <td>{{$order['orders']->id}}</td>
                        <td>{{$order['orders']->fish_name}}</td>
                        <td>{{$order['orders']->amount}}</td>
                        <td>{{$order['orders']->price}}</td>
                        <td>{{$od->amount}}</td>
                    </tr>

                    @endforeach
                @endforeach

                </tbody>
            </table>

        </div>

        <!-- Content Row -->

    </div>

@endsection 