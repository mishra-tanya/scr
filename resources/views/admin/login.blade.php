<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/login.css" rel="stylesheet">
</head>
<body>
            
    <div class="login-wrap">
        <div class="login-html">

            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab" style="margin-bottom: 30px">Admin Log In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab" style="margin-bottom: 40px"></label>
            <div class="login-form">
                <div class="sign-in-htm">
                  <form action={{ route('admin.login') }} method="POST">
                    @csrf
                    <div class="group">
                        <label for="user" class="label">Email</label>
                        <input id="user" type="email" name="email"placeholder="Enter Email" class="input">
                        @error('email')
                        <div>{{ $message }}</div>
                     @enderror
                    </div>
                  
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" name="password"placeholder="Enter Password" class="input" data-type="password">
                        @error('password')
                        <div>{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Log In">
                    </div>
                  </form>
                 
                    
                    
                    {{-- <div class="text-center">
                        <a href="#forgot">Forgot Password?</a>
                    </div> --}}
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        
                        <a href="/" style="margin-top:30px;">Back to Home Page</a>
            
                    </div>
                </div>
       
        </div>
    </div>
    
</body>
</html>