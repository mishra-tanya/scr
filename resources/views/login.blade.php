<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
  <link href="css/style.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
</head>
<body>
            
    <div class="login-wrap">
        <div class="login-html">

            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab" style="margin-bottom: 40px">Log In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab" style="margin-bottom: 40px">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Email</label>
                        <input id="user" type="email" placeholder="Enter Email" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" placeholder="Enter Password" class="input" data-type="password">
                    </div>
                 
                    <div class="group">
                        <input type="submit" class="button" value="Log In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                        <br><br>
                        <a href="/" style="margin-top:30px;">Back to Home Page</a>
            
                    </div>
                </div>
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" placeholder="Enter Username" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label>
                        <input id="pass" type="email"placeholder="Enter Email" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" placeholder="Enter Password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass" type="password" placeholder="Enter Password Again"class="input" data-type="password">
                    </div>
                  
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Signed Up?</a>
                    </div>
                </div>
            </div>
            
       
        </div>
    </div>
    
</body>
</html>