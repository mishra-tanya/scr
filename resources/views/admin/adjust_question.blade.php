<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCR: Question Limit</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    @include('admin.admin_nav')
    <br><br><br>
    <div class="m-4 shadow-md"id="adjust">
        <h2 class="text-center mt-4"> Questions Limit</h2>
        <div class=" row">
            <div class="col-12 shadow-md mb-4">
                <div class="container p-4 border ">
                        <h3> Questions Limit Per Test </h3>
                        <hr>
                        {{-- Scr test question limti --}}
                    <form action="">
                        <div class="row mb-3">
                        <div class="col-12 col-md-10 mb-3">
                            <label for="testSeries" class="form-label">SCR Test Series</label>
                            <select name="testSeries" id="testSeries" class="form-select">
                                <option value="">Select No. of Questions for SCR Test Series</option>
                                @for ($i = 5; $i <= 50; $i++)
                                    <option  class="form-control"value="{{ $i }}"> {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" style="background-color:#2487ce;padding:4px;border:none;width:100%;margin-top:33px;"
                            onmouseover="this.style.backgroundColor='#1a5f90'" 
                            onmouseout="this.style.backgroundColor='#2487ce'"
                            class="text-light">Submit</button>
                        </div>
                       </div>
                    </form>
                       
            {{-- mock test questions limti --}}
            <form action="">
                <div class="row mb-3">
                <div class="col-12 col-md-10 mb-3">
                    <label for="testSeries" class="form-label">SCR Mock Test </label>
                    <select name="testSeries" id="testSeries" class="form-select">
                        <option value="">Select No. of Questions for SCR Mock Series</option>
                        @for ($i = 5; $i <= 100; $i++)
                            <option  class="form-control"value="{{ $i }}"> {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <button type="submit" style="background-color:#2487ce;padding:4px;border:none;width:100%;margin-top:33px;"
                    onmouseover="this.style.backgroundColor='#1a5f90'" 
                    onmouseout="this.style.backgroundColor='#2487ce'"
                    class="text-light">Submit</button>
                </div>
            </div>
            </form>

            {{-- learning obj  --}}
                        {{-- mock test questions limti --}}
                        <form action="">
                            <div class="row">
                            <div class="col-12 col-md-10 mb-3">
                                <label for="testSeries" class="form-label">Learning Objectives </label>
                                <select name="testSeries" id="testSeries" class="form-select">
                                    <option value="">Select No. of Questions for Learning Objective</option>
                                    @for ($i = 5; $i <= 50; $i++)
                                        <option  class="form-control"value="{{ $i }}"> {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button type="submit" style="background-color:#2487ce;padding:4px;border:none;width:100%;margin-top:33px;"
                                onmouseover="this.style.backgroundColor='#1a5f90'" 
                                onmouseout="this.style.backgroundColor='#2487ce'"
                                class="text-light">Submit</button>
                            </div>
                        </div>
                        </form>
                </div>
            </div>
           
        </div>
    </div>
@include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
