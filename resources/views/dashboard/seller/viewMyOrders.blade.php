@extends('dashboard.seller.sellerDashboard')

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Orders</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="container-fluid">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Add ID</th>
                    <th scope="col">Fish Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Order Amount</th>
                    <th scope="col">Action</th>
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
                        <td>
                            <div class="row">
                            <form action="{{route('setOrderStatus',['orderStatus'=>'confirm'])}}" method="POST" id="regForm">
                                {{ csrf_field() }}
                                <input type="hidden" name="orderId" value="{{$od->id}}">
                                <input type="hidden" name="sellingId" value="{{$order['orders']->id}}">
                                <input type="hidden" name="fishId" value="{{$order['orders']->fish_id}}">
                                <input type="hidden" name="orderAmount" value="{{$order['orders']->amount- $od->amount }}">
                                <input type="hidden" name="fish_total" value="{{$order['orders']->fish_total- $od->amount }}">
                                <button class="btn btn-success" type="submit" href="{{route('setOrderStatus',['orderStatus'=>'conirm'])}}">Confirm</button>
                            </form>
                            <form action="{{route('setOrderStatus',['orderStatus'=>'reject'])}}" method="POST" id="regForm">
                                {{ csrf_field() }}
                                <input type="hidden" name="orderId" value="{{$od->id}}">
                                <input type="hidden" name="sellingId" value="{{$order['orders']->id}}">
                                <input type="hidden" name="fishId" value="{{$order['orders']->fish_id}}">
                                <input type="hidden" name="orderAmount" value="{{$order['orders']->amount- $od->amount }}">
                                <input type="hidden" name="fish_total" value="{{$order['orders']->fish_total- $od->amount }}">
                                <button class="btn btn-danger" type="submit" href="{{route('setOrderStatus',['orderStatus'=>'reject'])}}">Reject</button>
                            </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                @endforeach

                </tbody>
            </table>

        </div>

        <!-- Content Row -->

    </div>

@endsection 