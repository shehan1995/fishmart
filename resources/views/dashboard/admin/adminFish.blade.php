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
            height: 600px;
            width: 500px;
        }
    </style>
    <div class="container-fluid">
        <div class="row no-gutter row-modified">
            <div class="login d-flex align-items-center py-5">
                <div class="container card card-modified">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Add New Fish Here</h3>
                            <form action="{{url('dashboard/admin/post-createFish')}}" method="POST" enctype="multipart/form-data" id="regForm">
                                {{ csrf_field() }}
                                <div class="form-label-group">
                                    <input type="text" id="inputName" name="name" class="form-control" placeholder="Fish Name" autofocus>
                                    <label style="padding-top: 10px" for="inputName">Fish Name</label>

                                    @if ($errors->has('name'))
                                        <span class="error">{{ $errors->first('name') }}</span>
                                    @endif

                                </div>
                                <div class="form-label-group">
                                    <input type="number" id="inputPrice" name="avg_price" class="form-control" placeholder="Average Price" autofocus>
                                    <label style="padding-top: 10px" for="inputPrice">Average Price</label>

                                    @if ($errors->has('avg_price'))
                                        <span class="error">{{ $errors->first('avg_price') }}</span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4" align="right">Select Image</label>
                                        <div class="col-md-8">
                                            <input type="file" name="image" />
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('image'))
                                    <span class="error">{{ $errors->first('image') }}</span>
                                @endif
                                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 