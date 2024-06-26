<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .conatiner,
        #free-trials {
            margin-top: 50px;
            font-family: "Lucida Console", Courier, monospace;
        }

        .golden-card {
            background-color: #e1f1ff;
            border: 1px solid #007bff5e;
            color: #000000;
            margin-bottom: 40px;
            animation: slideIn 1s ease-out;
            transition: transform 0.3s ease-in-out;
        }

        .golden-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 128, 255, 0.6);
        }

        .golden-card .card-content {
            background-color: #e1f1ff;
        }

        .card-content p {
            font-size: 13px;
        }

        .golden-button {
            background-color: #0073ff;
            border: 1px solid #0b5fb8;
            color: #ffffff;
            width: 100%;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        .golden-button:hover {
            background-color: #0040ff;
            color: #fff8e1;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-100%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-container {
            width: 1200px;
            max-width: 600px;
            background-color: #f8f9fa;
            margin: 40px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .free {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="conatiner text-center mb-3">
        <h1 class="text-center">Buy Premium</h1>
        <p class="mt-3 ">Get started with  premium for life time access</p>
    </div>
    <div class="container mt-5 text-center ">
        <div class="row m-3">
            <div class="col-md-1"></div>
            <div class="card golden-card col-md-4 mx-auto ">
                <div class="p-4 pb-1">
                    <h3>Get Free Trials</h3>
                    <p style="text-decoration: underline">Only for Trial Days</p>

                </div>
                <div class="card-content p-4">
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2-circle text-success"></i>SCR Test Series </li>
                        <hr>
                        <li><i class="bi bi-check2-circle text-success"></i> All Learning Objectives </li>
                        <hr>
                        <li><i class="bi bi-check2-circle text-success"></i> Full Mock Tests</li>
                        <hr>
                        <li><i class="bi bi-check2-circle text-success"></i> Chapter Wise Notes</li>
                    </ul>

                </div>
                <a href="#free-trials" class="btn golden-button my-3">Ask for Free Trials</a>

            </div><br>
            <div class="card golden-card col-md-4 mx-auto ">
                <div class="p-4 pb-1">
                    <h3>Get Premium Here</h3>
                    <p>At Price <b>4000 ₹</b> Only </p>
                </div>
                <div class="card-content p-4">

                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2-circle text-success"></i> Complete SCR Test Series</li>
                        <hr>
                        <li><i class="bi bi-check2-circle text-success"></i> All Learning Objectives</li>
                        <hr>
                        <li><i class="bi bi-check2-circle text-success"></i> Full Mock Tests</li>
                        <hr>
                        <li><i class="bi bi-check2-circle text-success"></i> Chapter Wise Notes</li>
                    </ul>

                </div>
                <button class="btn golden-button my-3">Get Premium</button>

            </div><br>
            <div class="col-md-1"></div>
        </div>
    </div>
    <hr>
    <div id="free-trials">
        <div class="h1 text-center">Ask for Free trials</div>
        <div class="free">
            <div class="form-container mt-4">
                <form id="trial-request-form">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="trial" class="form-label">Trial Days</label>
                        <select class="form-select" id="trial" name="trial" required>
                            <option value="2">2 Days</option>
                            <option value="3">3 Days</option>
                            <option value="4">4 Days</option>
                            <option value="5">5 Days</option>
                            <option value="6">6 Days</option>
                            <option value="7">7 Days</option>
                            <option value="14">14 Days</option>
                            <option value="30">30 Days</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div id="trial-request-response" class="mt-3"></div>
        </div>
    </div>
    
    @include('footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#trial-request-form').submit(function (event) {
                event.preventDefault();
    
                // Get form data
                var formData = {
                    email: $('#email').val(),
                    trial: $('#trial').val()
                };
    
                // Send AJAX request to check if email exists
                $.ajax({
                    type: 'POST',
                    url: '/check-trial-request',
                    data: formData,
                    success: function (response) {
                        if (response.exists) {
                            // Email exists
                            $('#trial-request-response').html('Request again sent for trial.');
                        } else {
                            // Email doesn't exist
                            // Send AJAX request to store trial request
                            $.ajax({
                                type: 'POST',
                                url: '/trial-request',
                                data: formData,
                                success: function () {
                                    $('#trial-request-response').html('Yay! Free trial requested. Enjoy!');
                                },
                                error: function () {
                                    $('#trial-request-response').html('Error submitting trial request. Please try again.');
                                }
                            });
                        }
                    },
                    error: function () {
                        $('#trial-request-response').html('Error checking trial request. Please try again.');
                    }
                });
            });
        });
    </script>
    
</body>

</html>
