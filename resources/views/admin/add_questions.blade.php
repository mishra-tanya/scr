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
    <div class="m-4 shadow-md"id="questions">
        <h2 class="text-center mt-4">Add Questions</h2>
            <div class=" row">
                <div class="col-12 col-md-6 shadow-md mb-4" >
                   <div class="container p-4 border ">
                    <form action="">
                        <h3>Add SCR Questions</h3><hr>
                        <div class="mb-3">
                            <label for="chapter" class="form-label">Series</label>
                            <select name="chapter" id="chapter" class="form-select">
                                <option value="">Select Series</option>
                                    <option value="Test">Test Series</option>
                                    <option value="Mock">Mock Test</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="chapter" class="form-label">Chapter</label>
                            <select name="chapter" id="chapter" class="form-select">
                                <option value="">Select Chapter</option>
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}">Chapter {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="testSeries" class="form-label">Test/Mock Series</label>
                            <select name="testSeries" id="testSeries" class="form-select">
                                <option value="">Select Test Series</option>
                                @for ($j = 1; $j <= 3; $j++)
                                    <option value="{{ $j }}">Test/Mock Series {{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="testSeries" class="form-label">Question</label>
                            <textarea type="text" name=""class="form-control" id=""></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="testSeries" class="form-label">Option A</label>
                            <input type="text" name=""class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="testSeries" class="form-label">Option B</label>
                            <input type="text" name=""class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="testSeries" class="form-label">Option C</label>
                            <input type="text" name=""class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="testSeries" class="form-label">Option D</label>
                            <input type="text" name=""class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="testSeries" class="form-label">Correct Answer</label>
                            <select name="testSeries" id="testSeries" class="form-select">
                                <option value="">Select Correct Answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="testSeries" class="form-label">Reason</label>
                            <input type="text" name=""class="form-control" id="">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                   </div>
                </div>
                <div class="col-12 col-md-6 shadow-md mb-4" >
                    <div class="container p-4 border ">
                     <form action="">
                         <h3>Add Learning Objective Questions</h3><hr>
                         <div class="mb-3">
                             <label for="chapter" class="form-label">Chapter</label>
                             <select name="chapter" id="chapter" class="form-select">
                                 <option value="">Select Chapter</option>
                                 @for ($i = 1; $i <= 8; $i++)
                                     <option value="{{ $i }}">Chapter {{ $i }}</option>
                                 @endfor
                             </select>
                         </div>
                         <div class="mb-3">
                            <label for="chapter" class="form-label">Learning Objective</label>
                            <select name="chapter" id="chapter" class="form-select">
                                <option value="">Select Learning Objective</option>
                                    <option value="Test">Test Series</option>
                                    <option value="Mock">Mock Test</option>
                            </select>
                        </div>
                         <div class="mb-3">
                             <label for="testSeries" class="form-label">Question</label>
                             <textarea type="text" name=""class="form-control" id=""></textarea>
                         </div>
                         <div class="mb-3">
                             <label for="testSeries" class="form-label">Option A</label>
                             <input type="text" name=""class="form-control" id="">
                         </div>
                         <div class="mb-3">
                             <label for="testSeries" class="form-label">Option B</label>
                             <input type="text" name=""class="form-control" id="">
                         </div>
                         <div class="mb-3">
                             <label for="testSeries" class="form-label">Option C</label>
                             <input type="text" name=""class="form-control" id="">
                         </div>
                         <div class="mb-3">
                             <label for="testSeries" class="form-label">Option D</label>
                             <input type="text" name=""class="form-control" id="">
                         </div>
                         <div class="mb-3">
                            <label for="testSeries" class="form-label">Correct Answer</label>
                            <select name="testSeries" id="testSeries" class="form-select">
                                <option value="">Select Correct Answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                            </select>
                        </div>
                         <div class="mb-3">
                             <label for="testSeries" class="form-label">Reason</label>
                             <input type="text" name=""class="form-control" id="">
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
