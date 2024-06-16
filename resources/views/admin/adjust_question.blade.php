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
<style>
       .btn-submit {
            margin-top: 33px;
        }

        @media (max-width: 576px) {
            .btn-submit {
                margin-top: 10px;
                margin-bottom: 40px;
            }
        }
</style>
<body>
    @include('admin.admin_nav')
    <br><br><br>
    <div class="m-4 shadow-md" id="adjust">
        <h2 class="text-center mt-4">Questions Limit</h2>
        <div class="row">
            <div class="col-12 col-md-12 mb-4 ">
                <div class="text-center mt-3 text-dark">
                    <a href="#scr" class="text-dark mx-2" > SCR Test Questions Limit</a>
                    <a href="#mock_q" class="text-dark mx-2" > SCR Mock Questions Limit</a>
                    <a href="#lo" class="text-dark mx-2"> Learning Objectives Questions Limit</a>
                </div>
            </div>
            <div class="col-12 shadow-md mb-4">
                <div class="container p-4 border">
                    <h3>Questions Limit Per Test</h3>
                    <hr>

                    @if(session('success'))
                        <script>
                            alert("{{ session('success') }}");
                        </script>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Test Series Question Limits --}}
                    @for ($chapter = 1; $chapter <= 8; $chapter++)
                        @php
                            $chapterName = 'chapter' . $chapter;
                            $questionLimit = $questionLimits->firstWhere('chapter', $chapterName);
                            $selectedLimit = $questionLimit ? $questionLimit->question_limit : '';
                        @endphp
                        <form action="{{ route('store.question.limit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="chapter" value="chapter{{ $chapter }}">
                            <div class="row mb-3">
                                <div class="col-12 col-md-10 mb-3" id="scr">
                                    <label for="testSeries{{ $chapter }}" class="form-label">SCR Test Series: <b>Chapter {{ $chapter }}</b></label>
                                    <select name="question_limit" id="testSeries{{ $chapter }}" class="form-select">
                                        <option value="">Select No. of Questions for SCR Test Series</option>
                                        @for ($i = 5; $i <= 50; $i++)
                                            <option value="{{ $i }}" {{ $selectedLimit == $i ? 'selected' : '' }}> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-12 col-md-2">
                                    <button type="submit" class="text-light btn-submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    @endfor

                    {{-- Mock Test Question Limit --}}
                    @php
                        $mockLimit = $questionLimits->firstWhere('chapter', 'mock');
                        $selectedMockLimit = $mockLimit ? $mockLimit->question_limit : '';
                    @endphp
                    <form action="{{ route('store.question.limit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="chapter" value="mock">
                        <div class="row mb-3"id="mock_q">
                            <div class="col-12 col-md-10 mb-3" >
                                <label for="mockTest" class="form-label"><b>SCR Mock Test</b></label>
                                <select name="question_limit" id="mockTest" class="form-select">
                                    <option value="">Select No. of Questions for SCR Mock Series</option>
                                    @for ($i = 5; $i <= 100; $i++)
                                        <option value="{{ $i }}" {{ $selectedMockLimit == $i ? 'selected' : '' }}> {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button type="submit" class="text-light btn-submit">Submit</button>
                            </div>
                        </div>
                    </form>

                    {{-- Learning Objectives Question Limit --}}
                    @php
                        $loLimit = $questionLimits->firstWhere('chapter', 'lo');
                        $selectedLoLimit = $loLimit ? $loLimit->question_limit : '';
                    @endphp
                    <form action="{{ route('store.question.limit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="chapter" value="lo">
                        <div class="row mb-3" id="lo">
                            <div class="col-12 col-md-10 mb-3">
                                <label for="learningObjectives" class="form-label"><b>Learning Objectives</b></label>
                                <select name="question_limit" id="learningObjectives" class="form-select">
                                    <option value="">Select No. of Questions for Learning Objective</option>
                                    @for ($i = 5; $i <= 50; $i++)
                                        <option value="{{ $i }}" {{ $selectedLoLimit == $i ? 'selected' : '' }}> {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button type="submit" class="text-light btn-submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .btn-submit {
            background-color: #2487ce;
            padding: 4px;
            border: none;
            width: 100%;
        }

        .btn-submit:hover {
            background-color: #1a5f90;
        }
    </style>
</body>

</html>
