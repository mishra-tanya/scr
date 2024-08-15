<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Added Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
            <label for="tab-1" class="tab" style="margin-bottom: 30px">Log In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up">
            <label for="tab-2" class="tab" style="margin-bottom: 40px"></label>

            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                         @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('email'))
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-link p-0 mb-2 m-0 align-baseline text-white" data-bs-toggle="modal" data-bs-target="#verificationModal">
                            Resend Verification Email
                        </button>
                    @endif

                        @if (session('registered'))
                        <div class="alert alert-warning">
                            Please check your email and wait until you receive the email before attempting to resend the verification link. 
                            <button type="button" class="btn btn-link p-0 m-0 align-baseline text-warning" data-bs-toggle="modal" data-bs-target="#verificationModal">
                                Resend Verification Email
                            </button>
                        </div>
                    @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                         {{ $error }} 
                                    @endforeach
                            </div>
                        @endif
                      
                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="user" type="email" name="email" placeholder="Enter Email"
                                class="input">

                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" name="password" placeholder="Enter Password"
                                class="input" data-type="password">
                        
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Log In">
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#resetPasswordModal">Forgot
                            Password?</a>
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        Not Registered? <a href="{{ url('register') }}">Register Now</a>
                        <br><br>
                        <a href={{url('/')}} style="margin-top:30px;">Back to Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <br><br><br>
    <div class="modal fade " id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgba(1, 52, 88, 0.811);">
                    <h5 class="modal-title text-light" id="resetPasswordModalLabel">Reset Password</h5>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group text-dark">
                            <label for="email" class="col-form-label text-md-right">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text icon"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" placeholder="Enter Email" autocomplete="email"
                                    autofocus required>
                            </div>
                        </div>
                        <div class="form-group mx-1 text-center text-right mt-3">
                            <button type="submit" class="text-light"
                                style="background-color: rgba(55, 142, 181, 0.9);
                            padding:12px;
                            border-radius:10px;
                            border:none;
                            ">Send
                                Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- Verification Email Modal -->
        <div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="verificationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="verificationModalLabel">Resend Verification Email</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="col-form-label text-dark">Email Address:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ session('email') }}" >
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Resend Verification Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
{{-- 
    @if(session('registered'))
    <script>
        alert('Registration successful. Login Now!');
        window.location.href = "{{ route('login') }}";
    </script>
    @endif --}}
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
