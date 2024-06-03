<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   <title>SCR Dashboard </title>
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
                background-color: #63a9b7;
                color: #fff;
                width: 60%;
                border: none;
                font-size: 13px;
                border-radius: 70%;
                /* padding: 10px 20px; */
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
            
            @media (max-width:920px) {
                .custom-btn {
                background-color: #63a9b7;
                color: #fff;
                width: 70%;
                border: none;
                font-size: 13px;
                border-radius: 70%;
                /* padding: 10px 20px; */
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
        }
        
        </style>
   </head>
<body>
 @include('nav')
<br>
 <div class=" mt-4">
    <h2 class="text-center mb-4" style="background-color:rgb(235, 235, 235);padding:12px;">SCR Preparation Module</h2>
</div>

<div class="container mt-4">        
    <div class="row">
        @foreach ($chapters as $index => $chapter)
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card" style="background-color:#E6F7FF">
                    <div class="card-content">
                        <div class="card-item">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-label">{{ $chapter['title'] }}:</h4>
                                    <p>{{ $chapter['topic'] }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @foreach ($chapter['tests'] as $test)
                        
                        <form method="POST" action="{{ route('update-test-status') }}">
                            @csrf
                            <input type="hidden" name="chapter_id" value="{{  $index + 1 }}">
                            <input type="hidden" name="link" value="{{ $test['link'] }}">
                            <input type="hidden" name="status" value="{{ $test['status'] }}">
                            {{-- <input type="hidden" name="chapterTitle" value="{{ $chapter['title'] }}"> --}}
                            <input type="hidden" name="testLabel" value="{{ $test['label'] }}">
                            <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
                            
                            <div class="card-item row">
                                <div class="col-4">
                                    <div class="card-label">{{ $test['label'] }}</div>
                                </div>
                                <div class="col-8 text-end">
                                    <div class="card-value text-end">
                                        <button type="submit" class="btn text-capitalize custom-btn btn-block" @if(strtolower($test['status']) === 'attempted') disabled @endif>{{ $test['status'] }}</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

        </div>

<br>
        <div class=" mt-4">
            <h2 class="text-center mb-4" style="background-color:rgb(235, 235, 235);padding:12px;">Complete Mock Tests</h2>
        </div>


        {{-- MOck tests --}}
        
<div class="container mt-4">        
    <div class="row">
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card" style="background-color:#E6F7FF">
                    <div class="card-content">
                        <div class="card-item">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-label">Full Mock Tests</h4>
                                    <p>Complete Mock Tests</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        {{-- <form method="POST" action="{{ route('update-test-status') }}"> --}}
                            @csrf
                            {{-- <input type="hidden" name="chapter_id" value="{{  $index + 1 }}">
                            <input type="hidden" name="link" value="{{ $test['link'] }}">
                            <input type="hidden" name="status" value="{{ $test['status'] }}">
                            <input type="hidden" name="chapterTitle" value="{{ $chapter['title'] }}">
                            <input type="hidden" name="testLabel" value="{{ $test['label'] }}">
                            <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
                             --}}
                            <div class="card-item row">
                                <div class="col-5">
                                    <div class="card-label">Mock Test 1</div>
                                </div>
                                <div class="col-7 text-end">
                                    <div class="card-value text-end">
                                        {{-- <button type="submit" class="btn text-capitalize custom-btn btn-block" @if(strtolower($test['status']) === 'attempted') disabled @endif>{{ $test['status'] }}</button> --}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
    </div>

        </div>

<br>
<script>
    
    window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        });

</script>
</body>
</html>