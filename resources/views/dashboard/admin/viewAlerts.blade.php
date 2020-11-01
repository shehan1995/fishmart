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
            <h1 style="font-size: 70px; font-weight: bold" class="h3 mb-0 text-white">Alerts</h1>
        </div>

        <!-- Content Row -->
        <div class=" card container-fluid">
            <table class="table table-striped">
                <thead class="tb-header">
                <tr>
                    <th scope="col">Alert Id</th>
                    <th scope="col">Categary</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody class="tb-body">
                @foreach($details['alerts'] as $alert)
                    <tr>
                        {{--                    <th scope="row" class="counterCell">1</th>--}}
                        <td>{{$alert->id}}</td>
                        <td>{{$alert->categary}}</td>
                        <td>{{$alert->subject}}</td>
                        <td>{{$alert->message}}</td>
                        <td>{{$alert->status}}</td>
                        <td>{{$alert->created_at}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('updateAlert',['alertId'=>$alert->id])}}">Close</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <!-- Content Row -->

    </div>
@endsection 