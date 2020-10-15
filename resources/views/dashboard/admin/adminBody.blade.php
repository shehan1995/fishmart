@extends('dashboard.admin.adminDashboard')

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-white">Welcome to Admin Dashboard {{$details['name']}}</h1>
{{--        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
        </div>

        <!-- Content Row -->
        <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Selling Advertisemets</div>
                    <div class="h5 mb-0 font-weight-bold text-black-50">{{$details['selling']}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Buying Advertisements</div>
                    <div class="h5 mb-0 font-weight-bold text-black-50">{{$details['buying']}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users</div>
                    <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-black-50">{{$details['users']}}</div>
                    </div>

                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Fish Stock</div>
                    <div class="h5 mb-0 font-weight-bold text-black-50">{{$details['totalFish']}} KG</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="row">


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Selling Advertisemets</div>
                                <h5 class="m-b-30 f-w-700">Pending</h5>
                                <div class="progress">
                                    <div class="progress-bar bg-c-red" style="width:{{$details['sellingPending']}}%"></div>
                                </div>
                                <h5 class="m-b-30 f-w-700">Confirmed</h5>
                                <div class="progress">
                                    <div class="progress-bar bg-c-red" style="width:{{$details['sellingConfirmed']}}%"></div>
                                </div>
                                <h5 class="m-b-30 f-w-700">Inactive</h5>
                                <div class="progress">
                                    <div class="progress-bar bg-c-red" style="width:{{$details['sellingInactive']}}%"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Buying Advertisements</div>
                                <h5 class="m-b-30 f-w-700">Open</h5>
                                <div class="progress">
                                    <div class="progress-bar bg-c-red" style="width:{{$details['buyingOpen']}}%"></div>
                                </div>
                                <h5 class="m-b-30 f-w-700">Cancelled</h5>
                                <div class="progress">
                                    <div class="progress-bar bg-c-red" style="width:{{$details['buyingCancel']}}%"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-white">50%</div>
                                    </div>
                                    <div class="col">
                                        <h5 class="m-b-30 f-w-700">Sellers</h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-c-red" style="width:{{$details['sellers']}}%"></div>
                                        </div>
                                        <h5 class="m-b-30 f-w-700">Buyers</h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-c-red" style="width:{{$details['buyers']}}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Fish Stock</div>
                                @foreach($details['fish'] as $fish)
                                <h5 class="m-b-30 f-w-700">{{$fish['name']}}</h5>
                                <div class="progress">
                                    <div class="progress-bar bg-c-red" style="width:{{$fish['fish_bar']}}%"></div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection 