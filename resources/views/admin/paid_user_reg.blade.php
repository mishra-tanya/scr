<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCR Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            color: #ffffff;
            background: url(../assets/img/portfolio-3.jpg) no-repeat;
            background-size: 100%;
            font: 600 16px/18px 'Open Sans', sans-serif;
        }

        @media(max-width: 920px) {
            body {
                margin: 0;
                color: #ffffff;
                background: none;
                background-size: 100%;
                font: 600 16px/18px 'Open Sans', sans-serif;
            }
        }
    </style>
</head>

<body>
    @if(session('alert'))
        <script>
            window.onload = function() {
                alert("{{ session('alert') }}");
                window.location.href = "{{ url()->previous() }}"; 
            };
        </script>
    @endif
    <section class="h-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col d-flex justify-content-center align-items-center">
                    <div class="card card-registration shadow-lg my-4" style="width: 650px;">
                        <div class="card-body p-md-5 text-black">
                            <h3 class="mb-5 text-uppercase text-center"><b>Paid User Registration Form</b>
                                <hr>
                            </h3>
                            <form action={{ route('paid_user') }} method="post" id="registrationForm" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="first_name">First name</label>
                                            <input type="text" id="first_name" class="form-control" placeholder="Enter First Name" name="first_name" required pattern=".{2,}"/>
                                            <div class="invalid-feedback">
                                                First name must be at least 2 characters long.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="last_name">Last name</label>
                                            <input type="text" id="last_name" class="form-control" placeholder="Enter Last Name" name="last_name"  />
                                          
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="address">Address</label>
                                            <input type="text" id="address" class="form-control" placeholder="Enter Address" name="address" value="Admin Side Registration" required pattern=".{5,}" />
                                            <div class="invalid-feedback">
                                                Address must be at least 5 characters long.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="country">Country</label>
                                            <input type="text" id="country" class="form-control" placeholder="Enter Country" name="country" required pattern=".{4,}"/>
                                            <div class="invalid-feedback">
                                                Country must be at least 4 characters long.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="contact_no">Contact No.</label>
                                            <input type="text" id="contact_no" class="form-control" placeholder="Enter Contact No." name="contact_no" required pattern="\d{10}" />
                                            <div class="invalid-feedback">
                                                A valid 10-digit contact number is required.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="designation">Designation</label>
                                    <input type="text" id="designation" class="form-control" placeholder="Enter Designation" name="designation"  required pattern=".{4,}"/>
                                    <div class="invalid-feedback">
                                        Designation must be at least 4 character long.
                                    </div>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$"  />
                                    <div class="invalid-feedback">
                                        A valid email is required.
                                    </div>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" class="form-control" placeholder="Enter Password" name="password" required minlength="6" />
                                    <div class="invalid-feedback">
                                        Password must be at least 6 characters long.
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center pt-3">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary ms-2">Register</button>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center pt-3">
                                  <a href={{ url('admin/dashboard') }} class="mx-2" style="text-decoration: none"> Back to Dashboard</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            'use strict';

            var form = document.getElementById('registrationForm');

            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });

            var inputs = document.querySelectorAll('.form-control');

            inputs.forEach(function(input) {
                input.addEventListener('blur', function(event) {
                    validateInput(input);
                });

                input.addEventListener('input', function(event) {
                    validateInput(input);
                });
            });

            function validateInput(input) {
                if (input.checkValidity()) {
                    input.classList.remove('is-invalid');
                } else {
                    input.classList.add('is-invalid');
                }
            }
        })();
    </script>
</body>

</html>
