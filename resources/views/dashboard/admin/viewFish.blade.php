@extends('dashboard.admin.adminDashboard')

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
            <h1 style="font-size: 70px; font-weight: bold" class="h3 mb-0 text-white">Fish</h1>
        </div>

        <!-- Content Row -->
        <div class=" card container-fluid">
            <table class="table table-striped">
                <thead class="tb-header">
                <tr>
                    <th scope="col">Fish Id</th>
                    <th scope="col">Fish Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Image</th>
                </tr>
                </thead>
                <tbody class="tb-body">
                @foreach($details['fishes'] as $fish)
                    <tr>
                        {{--                    <th scope="row" class="counterCell">1</th>--}}
                        <td>{{$fish->id}}</td>
                        <td>{{$fish->name}}</td>
                        <td>{{$fish->amount}}</td>
                        <td>{{$fish->avg_price}}</td>
                        <td>{{$fish->created_at}}</td>
                        <td>
                            <img class="imgBorder" src="{{asset($fish->img)}}" width="100" height="100">
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <!-- Content Row -->

    </div>
@endsection 