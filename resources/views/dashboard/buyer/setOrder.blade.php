@extends('dashboard.buyer.buyerDashboard')

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="font-size: 70px; font-weight: bold" class="h3 mb-0 text-white">Set an Order</h1>
        </div>

        <!-- Content Row -->
        <div class="container-fluid">
            <div class="row">
                <div style="margin-left: 30px" class="col-6">
                    <div class="row">
                        <div class="card text-white bg-primary mb-3" style="width: 70%; height: 250px; padding: 20px">
                            <div class="card-body">
                                <h5 style="font-size: xx-large" class="card-title">{{$sellingAdd->fish_name}}</h5>
                                <p class="card-text">Available Amount : {{$sellingAdd->amount}} kg</p>
                                <p class="card-text">Seller Price: {{$sellingAdd->price}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card text-white bg-primary mb-3" style="width: 70%; height: 250px; padding: 20px">
                            <div class="card-body">
                                <h5 style="font-size:xx-large" class="card-title">Seller Details</h5>
                                <p class="card-text">Seller Name : {{$sellingAdd->seller->name}}</p>
                                <p class="card-text">Contact Number: {{$sellingAdd->seller->number}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="width: 500px; height: 500px; padding-top: 50px; padding-left: 60px" class="card">
                    <div class="row">
                        <h3 style="margin-bottom: 30px">Submit your order</h3>
                    </div>
                    <div class="row">
                        <form style="width: 80%" action="{{route('postSetOrder',['sellingId'=>$sellingAdd->id])}}"
                              method="POST" id="regForm">
                            {{ csrf_field() }}

                            <div class="form-label-group">
                                <input type="number" id="inputAmount" name="amount" class="form-control"
                                       placeholder="Amount in KG" min="0" max={{$sellingAdd->amount}} autofocus>
                                <label style="margin-top: 10px; margin-bottom: 60px" for="inputAmount">Amount in
                                    KG</label>

                                @if ($errors->has('amount'))
                                    <span class="error">{{ $errors->first('amount') }}</span>
                                @endif

                            </div>

                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Submit Order</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            Do you want to submit order for review
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Close
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- The Modal -->
                            <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                    type="button" data-toggle="modal" data-target="#myModal">Submit
                            </button>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Content Row -->

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
@endsection 