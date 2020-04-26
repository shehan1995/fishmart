@extends('dashboard.buyer.buyerDashboard')

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Register here!</h3>
                                <form action="{{url('dashboard/buyer/post-editProfile')}}" method="POST" id="regForm">
                                    {{ csrf_field() }}
                                    <div class="form-label-group" {{ $errors->has('name') ? ' has-error' : '' }}>
                                        <input type="text" id="inputName" name="name" class="form-control" placeholder="Full name" value="{{ $user->name }}" autofocus>
                                        <label for="inputName">Name</label>

                                        @if ($errors->has('name'))
                                            <span class="error">{{ $errors->first('name') }}</span>
                                        @endif

                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="inputNIC" name="nic" class="form-control" placeholder="NIC" value="{{$user->nic}}" autofocus>
                                        <label for="inputNIC">NIC</label>

                                        @if ($errors->has('NIC'))
                                            <span class="error">{{ $errors->first('NIC') }}</span>
                                        @endif

                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="inputName" name="address" class="form-control" placeholder="Address" value="{{$user->address}}" autofocus>
                                        <label for="inputAddress">Address</label>

                                        @if ($errors->has('address'))
                                            <span class="error">{{ $errors->first('address') }}</span>
                                        @endif

                                    </div>
                                    <div class="form-label-group">
                                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="{{$user->email}}" >
                                        <label for="inputEmail">Email address</label>

                                        @if ($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="inputNumber" name="number" class="form-control" placeholder="Contact Number" value="{{$user->number}}" autofocus>
                                        <label for="inputName">Contact Number</label>

                                        @if ($errors->has('number'))
                                            <span class="error">{{ $errors->first('number') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
                                        <label for="inputPassword">Password</label>

                                        @if ($errors->has('password'))
                                            <span class="error">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign Up</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

    </div>
@endsection 