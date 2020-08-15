@extends('dashboard.buyer.buyerDashboard')

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-white">Welcome to Buyer Dashboard {{$details['name']}}</h1>
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
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Spendings
                                    (Monthly)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-black-50">Rs. {{$details['monthly']}}</div>
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
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Spendings
                                    (Annual)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-black-50">Rs. {{$details['annual']}}</div>
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
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Advertisements</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-black-50">{{$details['buyingAds']}}</div>
                                    </div>
{{--                                    <div class="col">--}}
{{--                                        <div class="progress progress-sm mr-2">--}}
{{--                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"--}}
{{--                                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
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
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Orders
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-black-50">{{$details['pendingCount']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Spending Overview</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="buyerAreaChart"></canvas>
                            <input type="hidden" id="jan-orders" value="{{$details['jan']}}"/>
                            <input type="hidden" id="feb-orders" value="{{$details['feb']}}"/>
                            <input type="hidden" id="mar-orders" value="{{$details['mar']}}"/>
                            <input type="hidden" id="apr-orders" value="{{$details['apr']}}"/>
                            <input type="hidden" id="may-orders" value="{{$details['may']}}"/>
                            <input type="hidden" id="jun-orders" value="{{$details['jun']}}"/>
                            <input type="hidden" id="jul-orders" value="{{$details['jul']}}"/>
                            <input type="hidden" id="aug-orders" value="{{$details['aug']}}"/>
                            <input type="hidden" id="sep-orders" value="{{$details['sep']}}"/>
                            <input type="hidden" id="oct-orders" value="{{$details['oct']}}"/>
                            <input type="hidden" id="nov-orders" value="{{$details['nov']}}"/>
                            <input type="hidden" id="dec-orders" value="{{$details['dec']}}"/>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Orders Status</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="buyerPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                <span class="mr-2">
                    <input type="hidden" id="pending-orders" value="{{$details['pendingOrders']}}"/>
                    <i class="fas fa-circle text-primary"></i> Open
                </span>
                            <span class="mr-2">
                                <input type="hidden" id="confirm-orders" value="{{$details['confirmOrders']}}"/>
                    <i class="fas fa-circle text-success"></i> Approved
                </span>
                            <span class="mr-2">
                                <input type="hidden" id="reject-orders" value="{{$details['rejectOrders']}}"/>
                    <i class="fas fa-circle text-info"></i> Rejected
                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

    </div>
@endsection 