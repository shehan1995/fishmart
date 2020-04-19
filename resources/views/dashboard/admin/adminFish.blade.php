@extends('dashboard.admin.adminDashboard')

@section('body')
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Fish Update Here</h3>
                            <form action="{{url('dashboard/admin/post-createFish')}}" method="POST" id="regForm">
                                {{ csrf_field() }}
                                <div class="form-label-group">
                                    <input type="text" id="inputName" name="name" class="form-control" placeholder="Fish Name" autofocus>
                                    <label for="inputName">Fish Name</label>

                                    @if ($errors->has('name'))
                                        <span class="error">{{ $errors->first('name') }}</span>
                                    @endif

                                </div>
                                <div class="form-label-group">
                                    <input type="number" id="inputPrice" name="avg_price" class="form-control" placeholder="Average Price" autofocus>
                                    <label for="inputPrice">Average Price</label>

                                    @if ($errors->has('avg_price'))
                                        <span class="error">{{ $errors->first('avg_price') }}</span>
                                    @endif

                                </div>
                                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 