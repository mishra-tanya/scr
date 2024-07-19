<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCR Preparation Module</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            padding-top: 20px;
        }

        .card {
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
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
            background-color: #0A6847;
            color: #fff;
            width: 100%;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .custom-btn:hover {
            background-color: #0056b3;
        }

        hr {
            
            border: 2px solid rgb(0, 119, 255) !important;
            border-radius: 100%  !important;
            border-top: 1px dotted #000000 !important;
        }
        .cstm{
            padding: 3px;
            font-size: 12px;
            border:none;
        }
        .cstm:hover{
            background-color: #c9c9c9;
        }
    </style>
</head>
<body>
    <div class=" mt-4">
        <h2 class="text-center mb-4" style="background-color:rgb(235, 235, 235);padding:12px;">SCR Preparation Module</h2>
    </div>

    <div class="container mt-4">        
        <div class="row" >
            <div class="mt-3 mb-3">
                <form method="POST" action="{{ route('update.email.notification', $user->id) }}" id="emailNotificationForm">
                    @csrf
                    <input type="hidden" id="emailNotificationInput" name="email_notification" value="{{ $user->email_notification == 0 ? 1 : 0 }}">
                    @if($user->email_notification==1)
                     Email Notification is ON : 
                @else
                Email Notification is OFF : 
                @endif
                    <button type="submit" id="toggleEmailNotificationButton" class="cstm">
                        @if($user->email_notification==1)
                            Turn OFF Email 
                        @else
                        Turn ON Email 
                        @endif
                    </button>
                </form>
            </div>

           
            
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card" style="background-color:#E6F7FF">
                    <div class="card-content">
                        <div class="card-item">
                            <div class="row">
                                <div class="col-2">
                                    <i class="bi bi-journals fs-1"></i>
                                </div>
                                <div class="col-10">
                                    <h4 class="card-label">Learning Objective Test</h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Total Chapters</div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value">10</div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Attempted </div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value">{{$attempted}}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Total Learning Objectives </div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value">{{$lo_test_count}}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Total Questions</div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value ">{{$lo_count}}</div>
                            </div>
                        </div>
<hr>                        <a href="/learning_obj" class="btn text-light custom-btn btn-block" style="background-color: #38befd">Start Here</a>
                    </div>
                </div>
            </div>


            {{-- second --}}
            
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card" style="background-color:#E6FFEC">
                    <div class="card-content">
                        <div class="card-item">
                            <div class="row">
                                <div class="col-2">
                                    <i class="bi bi-bank fs-1 text-success"></i>
                                </div>
                                <div class="col-10">
                                    <h4 class="card-label">SCR <br> Question Bank</h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Total Chapters</div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value">8</div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Total Tests </div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value">29</div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Total Attempted Tests  </div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value">{{$attemptedCount}}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Total Questions</div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value ">{{$count}}</div>
                            </div>
                        </div>
<hr>                        <a href="/scr_questions" class="btn text-light custom-btn btn-block" style="background-color: #28A745">Start Here</a>
                    </div>
                </div>
            </div>

            {{-- third --}}
            
            <div class="col-lg-4 col-md-6 mb-3" >
                <div class="card" style="background-color:#FFF9E6">
                    <div class="card-content">
                        <div class="card-item">
                            <div class="row">
                                <div class="col-2">
                                    <i class="bi bi-pencil-square fs-1 text-warning"></i>
                                </div>
                                <div class="col-10">
                                    <h4 class="card-label">SCR <br> Revision Notes </h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Total Chapters</div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value">8</div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row ">
                            <div class="col-9"> 
                                <div class="card-label"> Total Seen Chapters </div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value">{{$numberOfChapters}}</div>
                            </div>
                        </div><hr>
                       <br><br><br><br>
                        
                        <a href="scr_notes" class="btn text-light  custom-btn btn-block mt-3" style="background-color: #826201">Start Here</a>
                    </div>
                </div>
            </div>


            {{-- fourth --}}
         
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card" style="background-color:#F2E6FF">
                    <div class="card-content">
                        <div class="card-item">
                            <div class="row">
                                <div class="col-2">
                                    <i class="bi bi-stack fs-1"></i>
                                </div>
                                <div class="col-10">
                                    <h4 class="card-label">SCR Revision Flash Card</h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Total Chapters</div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value">8</div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Total Chapters Seen </div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value">{{$numberOfFlashChapters}}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                {{-- <div class="card-label">Total Learning Objectives </div> --}}
                            </div>
                            <div class="col-3 text-end">
                                {{-- <div class="card-value">94</div> --}}
                            </div>
                        </div>
                        {{-- <hr> --}}
                        <div class="card-item row">
                            <div class="col-9"> 
                                {{-- <div class="card-label">Total Questions</div> --}}
                            </div>
                            <div class="col-3 text-end">
                                {{-- <div class="card-value ">470</div> --}}
                            </div>
                        </div>
                    <a href="flash_cards" class="btn text-light  custom-btn btn-block" style="background-color: #6F42C1">Start Here</a>
                    </div>
                </div>
            </div>


            {{-- fifth --}}
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card" style="background-color:#F5F5F5">
                    <div class="card-content">
                        <div class="card-item">
                            <div class="row">
                                <div class="col-2">
                                    <i class="bi bi-file-earmark-play-fill fs-1 text-secondary"></i>
                                </div>
                                <div class="col-10">
                                    <h4 class="card-label">SCR <br>Videos</h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item row">
                            <div class="col-9"> 
                                <div class="card-label">Total Videos</div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="card-value">13</div>
                            </div>
                        </div>
                        {{-- <hr> --}}
                        <hr>
                        <br><br>
                        <div class="card-item mt-2 row">
                            <div class="col-9"> 
                                {{-- <div class="card-label">Total Learning Objectives </div> --}}
                            </div>
                            <div class="col-3 text-end">
                                {{-- <div class="card-value">94</div> --}}
                            </div>
                        </div>
                        {{-- <hr> --}}
                        <div class="card-item row">
                            <div class="col-9"> 
                                {{-- <div class="card-label">Total Questions</div> --}}
                            </div>
                            <div class="col-3 text-end">
                                {{-- <div class="card-value ">470</div> --}}
                            </div>
                        </div>
                   <a href="scr_videos" class="btn text-light custom-btn btn-block" style="background-color: #555555">Start Here</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function () {
        //     const toggleEmailNotificationButton = document.getElementById('toggleEmailNotificationButton');
        //     const emailNotificationInput = document.getElementById('emailNotificationInput');
        //     const emailNotificationForm = document.getElementById('emailNotificationForm');
    
        //     toggleEmailNotificationButton.addEventListener('click', function () {
        //         const currentValue = emailNotificationInput.value;
        //         const newValue = currentValue === '1' ? '0' : '1';
        //         emailNotificationInput.value = newValue;
    
        //         // Submit the form when the status is toggled
        //         emailNotificationForm.submit();
        //     });
        // });
    </script>
    
</body>
</html>
