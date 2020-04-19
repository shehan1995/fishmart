@extends('dashboard.seller.sellerDashboard')

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buying Advertisement</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="container-fluid">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Fish Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Buy</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sellingAdds as $add)
                <tr>
{{--                    <th scope="row" class="counterCell">1</th>--}}
                    <td>{{$add->fish_name}}</td>
                    <td>{{$add->amount}}</td>
                    <td>{{$add->price}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('setOrder',['sellingId'=>$add->id])}}" >Set Order</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <!-- Content Row -->

    </div>
@endsection 