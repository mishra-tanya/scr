<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Learning Objective Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            padding-top: 20px;
        }

        .card {
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            width: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-content {
            padding: 20px;
        }

        .card-label {
            font-weight: bold;
            color: #555;
        }

        .card-value {
            color: #333;
        }

        .custom-btn {
            background-color: #63a9b7;
            color: #fff;
            width: 100%;
            border: none;
            font-size: 13px;
            border-radius: 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .custom-btn:hover {
            background-color: #0095b3;
        }

        hr {
            border: 1px solid rgb(0, 0, 0);
            border-radius: 100%;
            border-top: 1px dotted #000000;
        }

        @media (max-width: 920px) {
            .custom-btn {
                width: 100%;
            }
            .card-content {
            padding: 10px;
        }
        }
    </style>
</head>

<body>
    @include('nav')
    <br>
    <div class="mt-4">
        <h2 class="text-center mb-4" style="background-color: rgb(235, 235, 235); padding: 12px;">
            Learning Objective Test
        </h2>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card" style="background-color: #E6F7FF;">
                    <div class="card-content">
            @foreach ($testNames as $chapter => $tests)
                        <div class="card mb-4" >
                            
                            <div class="card-content">
                                <div class="card-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="text-center"><b>Lesson: {{substr($chapter,2)}}</b></h2>
                                        </div>
                                    </div>
                                </div>
                                <hr>  
                                    @foreach ($tests as $index=> $test)
                                    <div class="card-item row">
                                        <div class="col-12 col-md-10">
                                            <div class="card-label">
                                                <p>{{$index+1}}. {{ $test->title }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2 text-end">
                                            <div class="card-value text-end">
                                                <a href="questions/{{ $test->url_id }}/lo_test{{substr($chapter,2)}}" class="btn text-capitalize custom-btn btn-block" >Unattempted</a> </div>
                                        </div>
                                    </div>
                                    <hr>
                                      
                                    @endforeach
                            </div>
                        </div>
                        <hr><br>
                    @endforeach
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')

    <br>
    <script>
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        });
    </script>
</body>
