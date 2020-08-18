<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
        <div class="loginbox">
        <form action="{{url('post-login')}}" method="POST" id="logForm">
            {{ csrf_field() }}

            <h2>Log in</h2>
                <input type="nic" name="nic" id="inputNIC" placeholder="NIC" required>
                @if ($errors->has('nic'))
                  <span class="error">{{ $errors->first('nic') }}</span>
                  @endif
                @error('nic')
                    <span class=”invalid-feedback” role=”alert”>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" name="password" id="inputPassword" placeholder="Password"required><br><br>
                @if ($errors->has('password'))
                  <span class="error">{{ $errors->first('password') }}</span>
                  @endif  
                <input type="submit" value="Log in"><br><br>
            <hr>
            <p>Don't have an account? <a href="{{url('registration')}}">Sign Up</a></p>
            <p>Back to Home <a href="{{url('/')}}">Home</a></p>
        </form>
        </div>
      
</body>
</html>
