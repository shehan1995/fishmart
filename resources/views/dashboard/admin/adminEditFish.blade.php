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
            height: 750px;
            width: 500px;
        }
    </style>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="font-size:50px; font-weight: bold" class="h3 mb-0 text-white">Edit Fish</h1>
        </div>
        <!-- Content Row -->
        <div class="container-fluid">
            <div class="row no-gutter row-modified">
                <div class="login d-flex align-items-center py-5">
                    <div class="container card card-modified">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Edit Fish!</h3>
                                <form action="{{url('dashboard/admin/post-editFish')}}" method="POST" enctype="multipart/form-data" id="regForm">
                                    {{ csrf_field() }}
                                    <div class="form-label-group" {{ $errors->has('name') ? ' has-error' : '' }}>
                                        <input type="text" id="inputName" name="name" class="form-control"
                                               placeholder="Fish name" value="{{ $fish->name }}" autofocus>
                                        <label style="padding-top: 13px" for="inputName">Name</label>

                                        @if ($errors->has('name'))
                                            <span class="error">{{ $errors->first('name') }}</span>
                                        @endif

                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="inputPrice" name="avg_price" class="form-control"
                                               placeholder="Price" value="{{$fish->avg_price}}" autofocus>
                                        <label style="padding-top: 13px" for="inputPrice">Average Price</label>

                                        @if ($errors->has('price'))
                                            <span class="error">{{ $errors->first('price') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4" align="right">Edit Fish Image</label>
                                            <div class="col-md-8">
                                                <input type="file" name="image" id="image"/>
                                            </div>
                                        </div>
                                        @if ($errors->has('image'))
                                            <span class="error">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                    <input type="hidden" value="{{$fish->id}}" name="id" id="id"/>

                                    <button style="padding-top: 13px"
                                            class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                            type="submit">Update Fish
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