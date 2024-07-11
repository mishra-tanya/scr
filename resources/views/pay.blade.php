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
  @include('nav')
  <br><br>
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
                    <p>At Price <b>000 ₹</b> Only </p>
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
    
        <div class="h1 text-center m-2">Ask for Free trials</div>
       <div class="row m-3">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class=" card m-3 free">
                <div id="free-trials">
                  
                <div class="form-container m-3 mt-0 card-content ">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <form action={{route('trial.request')}} method="POST" id="trial-request-form">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" value={{Auth::user()->email}} readonly name="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="trial" class="form-label">Trial Days</label>
                            <select class="form-select" id="trial" name="trial" required>
                                @for ($i=3;$i<=60;$i+=3){
                                    <option value={{$i}}>{{$i}} Days</option>
                                }
                                @endfor
                               
                              
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div id="trial-request-response" class="mt-3"></div>
            </div>
        </div>
       </div>
    </div>
    
    @include('footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   
</body>

</html>
