<!-- resources/views/account-deactivated.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Account Deactivated</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <h4 class="text-center"><b>Your Registered Email : </b>
            {{Auth::user()->email}}
        </h4>
                <div class="alert alert-danger">
                    <h3 class="text-center">Account Deactivated</h3>
                    <hr>
                    <p>Your account has been deactivated by the admin due to one of the following reasons:</p>
                    <ul>
                        <li><b>Violation of Terms of Service:</b> Your activities on our platform were found to be in violation of our terms of service.</li>
                        <li><b>Suspicious Activity:</b> We detected unusual activity on your account which may indicate unauthorized access or potential security risks.</li>
                    </ul>
                    <hr>
                    <h4 class="text-center">Next Steps</h4>
                    <p>If you believe this deactivation is a mistake or if you need more information, please reach out to our support team.</p>
                    <hr>
                    <h4 class="text-center">Contact Information</h4>
                    <p><b>Email:</b> scr@indiaesg.org<br>
                       <b>Phone:</b> +91-9137835145</p>
                    <hr>
                    <p>We apologize for any inconvenience this may cause and are here to assist you in resolving this matter. Thank you for your understanding and cooperation.</p>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</body>

</html>
