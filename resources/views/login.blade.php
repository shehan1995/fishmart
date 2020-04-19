<!-- Specify that we want to extend the index file -->
@extends('index')
<!-- Set the title content to "Home" -->
@section('title', 'Login')
<!-- Set the "content" section, which will replace "@yield('content')" in the index file we're extending -->
@section('content')
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome back!</h3>
               <form action="{{url('post-login')}}" method="POST" id="logForm">
 
                 {{ csrf_field() }}
 
                <div class="form-label-group">
                  <input type="nic" name="nic" id="inputNIC" class="form-control" placeholder="NIC Number" >
                  <label for="inputNIC">NIC Number</label>
 
                  @if ($errors->has('nic'))
                  <span class="error">{{ $errors->first('nic') }}</span>
                  @endif    
                </div> 
 
                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                  <label for="inputPassword">Password</label>
                   
                  @if ($errors->has('password'))
                  <span class="error">{{ $errors->first('password') }}</span>
                  @endif  
                </div>
 
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>
                <div class="text-center">If you have an account?
                  <a class="small" href="{{url('registration')}}">Sign Up</a></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 