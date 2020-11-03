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
                            <h3 class="login-heading mb-4">Post an Alert Here</h3>
                            <form action="{{url('dashboard/admin/post-postAlert')}}" method="POST" enctype="multipart/form-data" id="regForm">
                                {{ csrf_field() }}
                                <div class="form-label-group">
                                    <select id="categary" name='categary'>
                                        <option value='Seller'>Seller</option>
                                        <option value='Buyer'>Buyer</option>
                                    </select>
                                    <label style="padding-top: 10px" for="categary">Select Categary</label>

                                    @if ($errors->has('categary'))
                                        <span class="error">{{ $errors->first('categary') }}</span>
                                    @endif

                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="inputSubject" name="subject" class="form-control" placeholder="Alert Subject" autofocus>
                                    <label style="padding-top: 10px" for="inputSubject">Alert Subject</label>

                                    @if ($errors->has('subject'))
                                        <span class="error">{{ $errors->first('subject') }}</span>
                                    @endif

                                </div>
                                <div class="form-label-group">
                                    <input type="" id="inputMessage" name="message" class="form-control" placeholder="Enter Message" autofocus>
                                    <label style="padding-top: 10px" for="inputMessage">Enter Message</label>

                                    @if ($errors->has('message'))
                                        <span class="error">{{ $errors->first('message') }}</span>
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