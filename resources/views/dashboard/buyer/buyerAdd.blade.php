@extends('dashboard.buyer.buyerDashboard')

@section('body')
    <style>
        .row-modified {
            align-content: center;
            justify-content: center;
            justify-items: center;
        }

        .card-modified {
            padding-top: 50px;
            height: 550px;
            width: 500px;
        }
    </style>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="font-size: 70px; font-weight: bold" class="h3 mb-0 text-white">Buying Advertisement</h1>
        </div>

        <!-- Content Row -->
        <div class="container-fluid">
            <div class="row row-modified no-gutter">
                <div class="login d-flex align-items-center py-5">
                    <div class="container card card-modified">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Buying Advertisement</h3>
                                <form action="{{url('dashboard/buyer/post-createAdd')}}" method="POST" id="regForm">
                                    {{ csrf_field() }}
                                    <div class="form-label-group">

                                        <select name='fish_id'>
                                            @foreach($fish as $fh)
                                                <option value="{{$fh->id}}">{{$fh->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="inputFish">Select Fish</label>

                                        @if ($errors->has('fish'))
                                            <span class="error">{{ $errors->first('fish') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-label-group" >
                                        <input type="number" id="inputAmount" name="amount" class="form-control" placeholder="Amount in KG" autofocus>
                                        <label for="inputAmount">Amount in KG</label>

                                        @if ($errors->has('amount'))
                                            <span class="error">{{ $errors->first('amount') }}</span>
                                        @endif

                                    </div>
                                    <div class="form-label-group">
                                        <input type="number" id="inputPrice" name="price" class="form-control" placeholder="Price" autofocus>
                                        <label for="inputPrice">Price</label>

                                        @if ($errors->has('price'))
                                            <span class="error">{{ $errors->first('price') }}</span>
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

        <!-- Content Row -->

    </div>
@endsection 