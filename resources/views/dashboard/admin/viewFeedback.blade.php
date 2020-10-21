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
            <h1 style="font-size: 70px; font-weight: bold" class="h3 mb-0 text-white">Feedback</h1>
        </div>

        <!-- Content Row -->
        <div class=" card container-fluid">
            <table class="table table-striped">
                <thead class="tb-header">
                <tr>
                    <th scope="col">Feedback Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody class="tb-body">
                @foreach($details['feedbacks'] as $feedback)
                    <tr>
                        {{--                    <th scope="row" class="counterCell">1</th>--}}
                        <td>{{$feedback->id}}</td>
                        <td>{{$feedback->name}}</td>
                        <td>{{$feedback->number}}</td>
                        <td>{{$feedback->status}}</td>
                        <td>{{$feedback->description}}</td>
                        <td>{{$feedback->created_at}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('updateFeedback',['feedbackId'=>$feedback->id])}}">Resolve</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <!-- Content Row -->

    </div>
@endsection 