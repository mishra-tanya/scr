<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

</head>
<style>
    body {
        margin: 0;
        color: #ffffff;
        background: url(../assets/img/portfolio-3.jpg) no-repeat;
        background-size: 100%;
        font: 600 16px/18px 'Open Sans', sans-serif;
    }
    @media(max-width:920px){
      body {
        margin: 0;
        color: #ffffff;
        background: none;
        background-size: 100%;
        font: 600 16px/18px 'Open Sans', sans-serif;
    }
    }
</style>

<body>
    <section class="h-100 ">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col d-flex justify-content-center align-items-center">
                    <div class="card card-registration shadow-lg my-4" style="width: 650px;">
                        <div class="card-body p-md-5 text-black">
                            <h3 class="mb-5 text-uppercase text-center"><b>Admin Registration form</b>
                                <hr>
                            </h3>
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                
                            <form action={{ route('admin.register') }} method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="form3Example1m">First name</label>
                                            <input type="text" id="form3Example1m" class="form-control "
                                                placeholder="Enter First Name" name="first_name" />
                                        </div>
                                        <div class=""style="color:red; font-size:12px;">
                                            @error('first_name')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="form3Example1n">Last name</label>
                                            <input type="text" id="form3Example1n" class="form-control "
                                                placeholder="Enter Last Name" name="last_name" />

                                        </div>
                                        <div class=""style="color:red; font-size:12px;">
                                            @error('last_name')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                  
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="form3Example1n1">Country</label>
                                            <input type="text" id="form3Example1n1" class="form-control "
                                                placeholder="Enter Country" name="country" />

                                        </div>
                                        <div class=""style="color:red; font-size:12px;">
                                            @error('country')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                              

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form3Example8">Email</label>
                                    <input type="email" id="form3Example8"
                                        class="form-control "placeholder="Enter Email" name="email" />
                                    <div class=""style="color:red; font-size:12px;">
                                        @error('email')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form3Example8">Password</label>
                                    <input type="text" id="form3Example8"
                                        class="form-control "placeholder="Enter Password" name="password" />
                                    <div class=""style="color:red; font-size:12px;">
                                        @error('password')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="d-flex justify-content-center pt-3">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary ms-2">Register</button>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center pt-3">
                                  <a href={{ url('admin/dashboard') }} class="text-dark"
                                        style="text-decoration: none"> Back to Dashboard</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>
