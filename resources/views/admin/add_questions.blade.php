<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCR: Add Questions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    @include('admin.admin_nav')
    <br><br><br>
    <div class="container my-4">
        <b><h2 class="text-center"><b>Add Questions</b></h2></b><br>
        <div class="row d-flex justify-content-center">
            <!-- SCR Questions Form -->
            <div class="col-12 col-md-10 mb-4 "style="">
                <div class="container p-4 border shadow-md" style="background-color: rgba(113, 191, 255, 0.279);">
                    <form action="{{ route('questions.scr.store') }}" method="POST">
                        @csrf
                        <h3><b>Add SCR Questions</b></h3><hr>
                        <div class="row">
                            <div class="col-12 col-md-4 mb-3">
                                <label for="chapter_id" class="form-label">Chapter</label>
                                <select name="chapter_id" id="chapter_id" class="form-select">
                                    <option value="">Select Chapter</option>
                                    @for ($i = 1; $i <= 8; $i++)
                                        <option value="{{ $i }}">Chapter {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                <label for="test_series" class="form-label">Test Series</label>
                                <select name="test_series" id="test_series" class="form-select">
                                    <option value="">Select Test Series</option>
                                    @for ($j = 1; $j <= 3; $j++)
                                        <option value="{{ $j }}">Test Series {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                <label for="result_ans" class="form-label">Correct Answer</label>
                                <select name="result_ans" id="result_ans" class="form-select">
                                    <option value="">Select Correct Answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="question_title" class="form-label">Question</label>
                                <textarea name="question_title" class="form-control" id="question_title"></textarea>
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="reason" class="form-label">Reason</label>
                                <textarea type="text" name="reason" class="form-control" id="reason"></textarea>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="option_a" class="form-label">Option A</label>
                                <input type="text" name="option_a" class="form-control" id="option_a">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="option_b" class="form-label">Option B</label>
                                <input type="text" name="option_b" class="form-control" id="option_b">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="option_c" class="form-label">Option C</label>
                                <input type="text" name="option_c" class="form-control" id="option_c">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="option_d" class="form-label">Option D</label>
                                <input type="text" name="option_d" class="form-control" id="option_d">
                            </div>
                        </div>
                        <button type="submit" style="background-color:#2487ce;padding:8px;border:none;width:100%;margin-top:20px;"
                    onmouseover="this.style.backgroundColor='#1a5f90'" 
                    onmouseout="this.style.backgroundColor='#2487ce'"
                    class="text-light">Add SCR Question</button>
                    </form>
                </div>
            </div>
            <br>
            <hr><br>
            <!-- SCR Mock Questions Form -->
            <div class="col-12 col-md-10 mb-4 "style="">
                <div class="container p-4 border shadow-md" style="background-color: rgba(113, 191, 255, 0.279);">
                   {{-- <form action=""></form> --}}
                    @csrf
                    <h3><b>Add SCR Mock Questions</b></h3><hr>
                    <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <label for="chapter_id" class="form-label">Chapter</label>
                            <select name="chapter_id" id="chapter_id" class="form-select">
                                <option value="">Select Chapter</option>
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}">Chapter {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="test_series" class="form-label">Mock Series</label>
                            <select name="test_series" id="test_series" class="form-select">
                                <option value="">Select Mock Series</option>
                                @for ($j = 1; $j <= 3; $j++)
                                    <option value="mock_test{{ $j }}">Mock Test {{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="result_ans" class="form-label">Correct Answer</label>
                            <select name="result_ans" id="result_ans" class="form-select">
                                <option value="">Select Correct Answer</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="question_title" class="form-label">Question</label>
                            <textarea name="question_title" class="form-control" id="question_title"></textarea>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="reason" class="form-label">Reason</label>
                            <textarea type="text" name="reason" class="form-control" id="reason"></textarea>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="option_a" class="form-label">Option A</label>
                            <input type="text" name="option_a" class="form-control" id="option_a">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="option_b" class="form-label">Option B</label>
                            <input type="text" name="option_b" class="form-control" id="option_b">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="option_c" class="form-label">Option C</label>
                            <input type="text" name="option_c" class="form-control" id="option_c">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="option_d" class="form-label">Option D</label>
                            <input type="text" name="option_d" class="form-control" id="option_d">
                        </div>
                    </div>
                    <button type="submit" style="background-color:#2487ce;padding:8px;border:none;width:100%;margin-top:20px;"
                    onmouseover="this.style.backgroundColor='#1a5f90'" 
                    onmouseout="this.style.backgroundColor='#2487ce'"
                    class="text-light">Add SCR Mock Question</button>
                </div>
            </div>
<br><hr><br>
            <!-- Learning Objective Questions Form -->
            <div class="col-12 col-md-10 mb-4 "style=""id="learning_obj">
                <div class="container p-4 border shadow-md" style="background-color: rgba(113, 191, 255, 0.279);">
                    <form action="{{ route('questions.lo.store') }}" method="POST">
                        @csrf
                        <h3><b>Add Learning Objective Questions</b></h3><hr>
                        <div class="row">
                            <div class="col-12 col-md-4 mb-3">
                                <label for="chapter_id" class="form-label">Chapter</label>
                                <select name="chapter_id" id="chapter_id" class="form-select">
                                    <option value="">Select Chapter</option>
                                    @for ($i = 1; $i <= 8; $i++)
                                        <option value="{{ $i }}">Chapter {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                <label for="learning_objective" class="form-label">Learning Objective</label>
                                <select name="learning_objective" id="learning_objective" class="form-select">
                                    <option value="">Select Learning Objective</option>
                                    <option value="Objective1">Objective 1</option>
                                    <option value="Objective2">Objective 2</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                <label for="result_ans" class="form-label">Correct Answer</label>
                                <select name="result_ans" id="result_ans" class="form-select">
                                    <option value="">Select Correct Answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="question_title" class="form-label">Question</label>
                                <textarea name="question_title" class="form-control" id="question_title"></textarea>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="reason" class="form-label">Reason</label>
                                <textarea type="text" name="reason" class="form-control" id="reason"></textarea>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="option_a" class="form-label">Option A</label>
                                <input type="text" name="option_a" class="form-control" id="option_a">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="option_b" class="form-label">Option B</label>
                                <input type="text" name="option_b" class="form-control" id="option_b">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="option_c" class="form-label">Option C</label>
                                <input type="text" name="option_c" class="form-control" id="option_c">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="option_d" class="form-label">Option D</label>
                                <input type="text" name="option_d" class="form-control" id="option_d">
                            </div>
                           
                           
                        </div>
                        <button type="submit" style="background-color:#2487ce;padding:8px;border:none;width:100%;margin-top:20px;"
                    onmouseover="this.style.backgroundColor='#1a5f90'" 
                    onmouseout="this.style.backgroundColor='#2487ce'"
                    class="text-light">Add Learning Objective</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        @if(session('success'))
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        @endif
    </script>
</body>
</html>
