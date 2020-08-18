@extends('dashboard.buyer.buyerDashboard')

@section('body')
    <style>
        .tb-header {
            color: black;
            font-weight: bold;
            font-size: larger;
        }

        .tb-body {
            color: black;
            font-weight: bold;
            font-size: large;
        }
    </style>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="font-size: 70px; font-weight: bold" class="h3 mb-0 text-white">My Advertisement</h1>
        </div>

        <!-- Content Row -->
        <div class=" card container-fluid">
            <table class="table table-striped">
                <thead class="tb-header">
                <tr>
                    <th scope="col">Fish Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody class="tb-body">
                @foreach($buyingAdds as $add)
                    <tr>
                        {{--                    <th scope="row" class="counterCell">1</th>--}}
                        <td>{{$add->fish_name}}</td>
                        <td>{{$add->amount}}</td>
                        <td>{{$add->price}}</td>
                        <td>{{$add->created_at}}</td>
                        <td>{{$add->status}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('cancelBuyingAd',['buyingAdId'=>$add->id])}}">Cancel
                                Ad</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <!-- Content Row -->

    </div>
@endsection 