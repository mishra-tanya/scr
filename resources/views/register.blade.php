<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
       <!-- Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
       <!-- Bootstrap Icons -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
   
</head>
<style>
    body{
        margin:0;
	color:#ffffff;
	background:url(../assets/img/portfolio-3.jpg) no-repeat ;
    background-size: 100%;
	font:600 16px/18px 'Open Sans',sans-serif;
    }
</style>
<body>
    <nav
        class="navbar navbar-expand-sm bg-light bg-primary shadow-sm"
    >
        <a class="navbar-brand mx-3 m-2" href="#"><b>SCR</b></a>
        <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
        ></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item mx-4">
                    <a class="nav-link active" href="/" aria-current="page"
                        >Home <span class="visually-hidden"></span></a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{url('login')}}>Login</a>
                </li>
               
            </ul>
           
        </div>
    </nav>
    
    <section class="h-100 ">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col d-flex justify-content-center align-items-center">
              <div class="card card-registration shadow-lg my-4" style="width: 650px;">
                 <div class="card-body p-md-5 text-black">
                      <h3 class="mb-5 text-uppercase text-center"><b>SCR Registration form</b><hr></h3>
                     <form action={{route('register')}} method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                              <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="form3Example1m">First name</label>
                                <input type="text" id="form3Example1m" class="form-control " placeholder="Enter First Name" name="first_name" />
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
                                <input type="text" id="form3Example1n" class="form-control " placeholder="Enter Last Name"  name="last_name" />
                              
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
                                <label class="form-label" for="form3Example1m1">Address</label>
                                <input type="text" id="form3Example1m1" class="form-control "placeholder="Enter Address"  name="address" />
                                
                            </div>
                            <div class=""style="color:red; font-size:12px;">
                                @error('address')
                                <div>{{ $message }}</div>
                            @enderror 
                        </div>
                            </div>
                            <div class="col-md-6 mb-4">
                              <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="form3Example1n1">Country</label>
                                <input type="text" id="form3Example1n1" class="form-control " placeholder="Enter Country"  name="country"/>
                                 
                            </div>
                            <div class=""style="color:red; font-size:12px;">
                                @error('country')
                                <div>{{ $message }}</div>
                            @enderror 
                        </div>
                            </div>
                          </div>
          
                          <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example8">Designation</label>
                            <input type="text" id="form3Example8" class="form-control " placeholder="Enter Designation" name="designation" />
                            <div class=""style="color:red; font-size:12px;">
                                @error('designation')
                                <div>{{ $message }}</div>
                            @enderror 
                        </div>  
                        </div>
    
                          <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example8">Email</label>
                            <input type="email" id="form3Example8" class="form-control "placeholder="Enter Email"  name="email" />
                            <div class=""style="color:red; font-size:12px;">
                                @error('email')
                                <div>{{ $message }}</div>
                            @enderror 
                        </div>  
                        </div>
    
                          <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example8">Password</label>
                            <input type="text" id="form3Example8" class="form-control "placeholder="Enter Password"  name="password"/>
                            <div class=""style="color:red; font-size:12px;">
                                @error('password')
                                <div>{{ $message }}</div>
                            @enderror 
                        </div> 
                        </div>
          
          
                          <div class="d-flex justify-content-center pt-3">
                            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary ms-2">Register</button>
                          </div>
                          <hr>
                          <div class="d-flex justify-content-center pt-3">
                            Already Registered? <a href={{url('login')}} class="mx-2" style="text-decoration: none"> Login now</a>
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