<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{url('style.css')}}">
</head>
<body>
<div class="signupbox">
    <form action="{{url('post-registration')}}" method="POST" enctype="multipart/form-data" id="regForm">
        {{ csrf_field() }}
        <h2>Sign Up</h2>

        <input type="text" id="inputName" name="name" class="form-control" placeholder="Full Name" autofocus>
        @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
        @endif

        <input type="text" id="inputNIC" name="nic" class="form-control" placeholder="NIC" autofocus>

        @if ($errors->has('NIC'))
            <span class="error">{{ $errors->first('NIC') }}</span>
        @endif
        @error('nic')
        <span class=”invalid-feedback” role=”alert”>
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
        <input type="text" id="address" name="address" class="form-control" placeholder="Address" autofocus>
        @if ($errors->has('address'))
            <span class="error">{{ $errors->first('address') }}</span>
        @endif

        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address">
        @if ($errors->has('number'))
            <span class="error">{{ $errors->first('number') }}</span>
        @endif
        <input type="text" id="inputNumber" name="number" class="form-control" placeholder="Contact Number" autofocus>
        @if ($errors->has('number'))
            <span class="error">{{ $errors->first('number') }}</span>
        @endif
        <div class="form-label-group">
            <select name='categary'>
                <option value='Seller'>Seller</option>
                <option value='Buyer'>Buyer</option>
                {{--                        <option value='Admin'>Admin</option>--}}
            </select>
            <label for="inputCategary">Select Categary</label>

            @if ($errors->has('number'))
                <span class="error">{{ $errors->first('number') }}</span>
            @endif

        </div>

        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
        @if ($errors->has('password'))
            <span class="error">{{ $errors->first('password') }}</span>
        @endif
        <div class="form-group">
            <div class="row">
                <label class="col-md-4" align="right">Select Profile Image</label>
                <div class="col-md-8">
                    <input type="file" name="user_image" />
                </div>
            </div>
        </div>
        @if ($errors->has('user_image'))
            <span class="error">{{ $errors->first('user_image') }}</span>
        @endif
        <input type="submit" value="Sign Up"><br><br>
        <hr>
        <p>Have an account? <a href="{{url('login')}}">Log in</a></p>
        <p>Back to Home <a href="{{url('/')}}">Home</a></p>
    </form>
</div>

{{--        @error('failed')--}}
{{--        <div class="modal" id="myModal">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}

{{--                    <!-- Modal Header -->--}}
{{--                    <div class="modal-header">--}}
{{--                        <h4 class="modal-title">Submit Order</h4>--}}
{{--                        <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                    </div>--}}

{{--                    <!-- Modal body -->--}}
{{--                    <div class="modal-body">--}}
{{--                        Do you want to submit order for review--}}
{{--                    </div>--}}

{{--                    <!-- Modal footer -->--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="submit" class="btn btn-primary" >Submit</button>--}}
{{--                        <button type="submit" class="btn btn-danger" data-dismiss="modal" >Close</button>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @enderror--}}

</body>
</html>
