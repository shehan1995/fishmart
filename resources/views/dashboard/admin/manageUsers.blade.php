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
                    <th scope="col">User Id</th>
                    <th scope="col">Categary</th>
                    <th scope="col">NIC</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody class="tb-body">
                @foreach($details['allUsers'] as $user)
                    <tr>
                        {{--                    <th scope="row" class="counterCell">1</th>--}}
                        <td>{{$user->id}}</td>
                        <td>{{$user->categary}}</td>
                        <td>{{$user->nic}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->status}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{route('blockUser',['userId'=>$user->id, 'status'=>0])}}">Block</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{route('blockUser',['userId'=>$user->id,'status'=>1])}}">Unblock</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <!-- Content Row -->

    </div>
@endsection 