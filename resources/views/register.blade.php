<!-- Specify that we want to extend the index file -->
@extends('index')

@section('content')
 
    <!-- Project Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registration Form</h6>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row no-gutter">
                    
                        <div class="container">
                            <h3 class="login-heading mb-4">Register here!</h3>
                            <div class="row">
                            <div class="col-xl-10">
                                <form action="{{url('post-registration')}}" method="POST" id="regForm">
                                    {{ csrf_field() }}

                                    <div class="form-label-group">
                                    <input type="text" id="inputName" name="name" class="form-control" placeholder="Full name" autofocus>
                                    <label for="inputName">Name</label>
                    
                                    @if ($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                    @endif       
                    
                                    </div> 
                                    <div class="form-label-group">
                                    <input type="text" id="inputNIC" name="nic" class="form-control" placeholder="NIC" autofocus>
                                    <label for="inputNIC">NIC</label>
                    
                                    @if ($errors->has('NIC'))
                                    <span class="error">{{ $errors->first('NIC') }}</span>
                                    @endif       
                    
                                    </div> 
                                    <div class="form-label-group">
                                    <input type="text" id="inputName" name="address" class="form-control" placeholder="Address" autofocus>
                                    <label for="inputAddress">Address</label>
                    
                                    @if ($errors->has('address'))
                                    <span class="error">{{ $errors->first('address') }}</span>
                                    @endif       
                    
                                    </div> 
                                    <div class="form-label-group">
                                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" >
                                    <label for="inputEmail">Email address</label>
                    
                                    @if ($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                    @endif    
                                    </div> 
                                    <div class="form-label-group">
                                    <input type="text" id="inputNumber" name="number" class="form-control" placeholder="Contact Number" autofocus>
                                    <label for="inputName">Contact Number</label>
                    
                                    @if ($errors->has('number'))
                                    <span class="error">{{ $errors->first('number') }}</span>
                                    @endif       
                    
                                    </div> 
                                    <div class="form-label-group">
                                    <select name='categary'>
                                        <option value='Seller'>Seller</option>
                                        <option value='Buyer'>Buyer</option>
                                    </select>
                                    <label for="inputCategary">Select Categary</label>
                    
                                    @if ($errors->has('number'))
                                    <span class="error">{{ $errors->first('number') }}</span>
                                    @endif       
                    
                                    </div> 
                                    <div class="form-label-group">
                                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                                    <label for="inputPassword">Password</label>
                                    
                                    @if ($errors->has('password'))
                                    <span class="error">{{ $errors->first('password') }}</span>
                                    @endif  
                                    </div>
                    
                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign Up</button>
                                    <div class="text-center">If you have an account?
                                    <a class="small" href="{{url('login')}}">Sign In</a></div>
                                </form>
                            </div>
                            <div class="col-xl-2">
                                
                                <form runat="server">
                                    <input type='file' id="imgInp" />
                                    <img id="blah" src="#" alt="your image" width="150" height="150" />
                                </form>
                                <script>
                                    function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        
                                        reader.onload = function(e) {
                                        $('#blah').attr('src', e.target.result);
                                        }
                                        
                                        reader.readAsDataURL(input.files[0]); // convert to base64 string
                                    }
                                    }
                                    $("#imgInp").change(function() {
                                        readURL(this);
                                    });
                                </script>
                            </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection 