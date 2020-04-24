@extends('dashboard.buyer.buyerDashboard')

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Set an Order</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$sellingAdd->fish_name}}</h5>
                            <p class="card-text">Available Amount : {{$sellingAdd->amount}}</p>
                            <p class="card-text">Seller Price: {{$sellingAdd->price}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                            <div class="row">
                                <h3>Submit your order</h3>
                            </div>
                            <div class = "row">
                                <form action="{{route('postSetOrder',['sellingId'=>$sellingAdd->id])}}" method="POST" id="regForm">
                                    {{ csrf_field() }}

                                    <div class="form-label-group" >
                                        <input type="number" id="inputAmount" name="amount" class="form-control" placeholder="Amount in KG" autofocus>
                                        <label for="inputAmount">Amount in KG</label>

                                        @if ($errors->has('amount'))
                                            <span class="error">{{ $errors->first('amount') }}</span>
                                        @endif

                                    </div>


                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Submit</button>

                                </form>
                            </div>

                </div>
            </div>
        </div>

        <!-- Content Row -->

    </div>
@endsection 