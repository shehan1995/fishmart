@extends('dashboard.admin.adminDashboard')

@section('body')
    <style>
        .row-modified {
            align-content: center;
            justify-content: center;
            justify-items: center;
        }

        .card-modified {
            padding-top: 50px;
            height: 450px;
            width: 500px;
        }
    </style>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="font-size:50px; font-weight: bold" class="h3 mb-0 text-white">View Profile</h1>
        </div>
        <!-- Content Row -->
        <div class="container-fluid">
            <div class="row no-gutter row-modified">
                <div class="login d-flex align-items-center py-5">
                    <div class="container card card-modified">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 mx-auto">
                                <h3 style="margin-left: auto; padding-top: 20px" class="login-heading mb-4">View your
                                    profile here!</h3>
                                <div style="padding-top: 10px; font-size: large" class="row">
                                    <div class="col-6">
                                        <label style="font-weight: bold">Seller Name</label>
                                    </div>
                                    <div class="col-6">
                                        <label>{{$user->name}}</label>
                                    </div>
                                </div>
                                <div style="padding-top: 10px; font-size: large" class="row">
                                    <div class="col-6">
                                        <label style="font-weight: bold">Seller NIC</label>
                                    </div>
                                    <div class="col-6">
                                        <label>{{$user->nic}}</label>
                                    </div>
                                </div>
                                <div style="padding-top: 10px; font-size: large" class="row">
                                    <div class="col-6">
                                        <label style="font-weight: bold">Seller Email</label>
                                    </div>
                                    <div class="col-6">
                                        <label>{{$user->email}}</label>
                                    </div>
                                </div>
                                <div style="padding-top: 10px; font-size: large" class="row">
                                    <div class="col-6">
                                        <label style="font-weight: bold">Contact Number</label>
                                    </div>
                                    <div class="col-6">
                                        <label>{{$user->number}}</label>
                                    </div>
                                </div>
                                <div style="padding-top: 10px; font-size: large" class="row">
                                    <div class="col-6">
                                        <label style="font-weight: bold">Image</label>
                                    </div>
                                    <div class="col-6">
                                        <img class="imgBorder" src="{{asset($details['user_image'])}}" width="100" height="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 