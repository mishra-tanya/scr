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

<body>
    <div class="m-4 shadow-md"id="adjust">
        <h2 class="text-center mt-4"> Questions Limit</h2>
        <div class=" row">
            <div class="col-12 col-md-6 shadow-md mb-4">
                <div class="container p-4 border ">
                    <form action="">
                        <h3>Limit SCR Questions</h3>
                        <hr>
                        <div class="mb-3">
                            <label for="testSeries" class="form-label">Test Series</label>
                            <select name="testSeries" id="testSeries" class="form-select">
                                <option value="">Select No. of Questions</option>
                                @for ($i = 5; $i <= 50; $i++)
                                    <option  class="form-control"value="{{ $i }}"> {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="testSeries" class="form-label">Mock Series</label>
                            <select name="testSeries" id="testSeries" class="form-select">
                                <option value="">Select No. of Questions</option>
                                @for ($i = 5; $i <= 100; $i++)
                                    <option class="form-control" value="{{ $i }}"> {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 shadow-md mb-4">
                <div class="container p-4 border ">
                    <form action="">
                        <h3>Limit SCR Questions</h3>
                        <hr>
                        <div class="mb-3">
                            <label for="testSeries" class="form-label">Number of Questions</label>
                            <select name="testSeries" id="testSeries" class="form-select">
                                <option value="">Select Number of Questions</option>
                                @for ($i = 5; $i <= 50; $i++)
                                    <option value="{{ $i }}">Chapter {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
