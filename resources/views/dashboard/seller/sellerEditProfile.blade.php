@extends('dashboard.seller.sellerDashboard')

@section('body')
    <style>
        .row-modified {
            align-content: center;
            justify-content: center;
            justify-items: center;
        }

        .card-modified {
            padding-top: 50px;
            height: 750px;
            width: 500px;
        }
    </style>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="font-size:50px; font-weight: bold" class="h3 mb-0 text-white">Edit Profile</h1>
        </div>
        <!-- Content Row -->
        <div class="container-fluid">
            <div class="row no-gutter row-modified">
                <div class="login d-flex align-items-center py-5">
                    <div class="container card card-modified">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Edit your profile here!</h3>
                                <form action="{{url('dashboard/seller/post-editProfile')}}" method="POST" enctype="multipart/form-data" id="regForm">
                                    {{ csrf_field() }}
                                    <div class="form-label-group" {{ $errors->has('name') ? ' has-error' : '' }}>
                                        <input type="text" id="inputName" name="name" class="form-control"
                                               placeholder="Full name" value="{{ $user->name }}" autofocus>
                                        <label style="padding-top: 13px" for="inputName">Name</label>

                                        @if ($errors->has('name'))
                                            <span class="error">{{ $errors->first('name') }}</span>
                                        @endif

                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="inputNIC" name="nic" class="form-control"
                                               placeholder="NIC" value="{{$user->nic}}" autofocus>
                                        <label style="padding-top: 13px" for="inputNIC">NIC</label>

                                        @if ($errors->has('NIC'))
                                            <span class="error">{{ $errors->first('NIC') }}</span>
                                        @endif

                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="inputName" name="address" class="form-control"
                                               placeholder="Address" value="{{$user->address}}" autofocus>
                                        <label style="padding-top: 13px" for="inputAddress">Address</label>

                                        @if ($errors->has('address'))
                                            <span class="error">{{ $errors->first('address') }}</span>
                                        @endif

                                    </div>
                                    <div class="form-label-group">
                                        <input type="email" name="email" id="inputEmail" class="form-control"
                                               placeholder="Email address" value="{{$user->email}}">
                                        <label style="padding-top: 13px" for="inputEmail">Email address</label>

                                        @if ($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="inputNumber" name="number" class="form-control"
                                               placeholder="Contact Number" value="{{$user->number}}" autofocus>
                                        <label style="padding-top: 13px" for="inputName">Contact Number</label>

                                        @if ($errors->has('number'))
                                            <span class="error">{{ $errors->first('number') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" name="password" id="inputPassword" class="form-control"
                                               placeholder="Password">
                                        <label style="padding-top: 13px" for="inputPassword">Password</label>

                                        @if ($errors->has('password'))
                                            <span class="error">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4" align="right">Edit Profile Image</label>
                                            <div class="col-md-8">
                                                <input type="file" name="image" id="image"/>
                                            </div>
                                        </div>
                                        @if ($errors->has('image'))
                                            <span class="error">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>


                                    <button style="padding-top: 13px"
                                            class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                            type="submit">Sign Up
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 