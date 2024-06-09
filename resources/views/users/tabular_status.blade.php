<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        table th {
            background: #2487ce !important;
            color: white !important;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>


    {{--  for scr question bank --}}

    <div class="m-4 border shadow-md">
        <h2 class="text-center " style="background-color: rgb(255, 255, 255); padding: 12px;">SCR Question Bank Results
        </h2>
        <div class="container">
            <div class="panel">
                <div class="table-responsive">
                    <table id="scrQuestionBankTable" class="table  text-center table-bordered table-condensed">
                        <thead style="">
                            <tr>
                                <th>S.No.</th>
                                <th>User Id</th>
                                <th>Chapter</th>
                                <th>Test</th>
                                <th>Status</th>
                                <th>Results</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scr_results as $key => $scr_result)
                                <td>{{ $key + 1 }}</td>
                                <td>{{ Auth::user()->email }}</td>
                                @if (is_numeric($scr_result->chapter_id))
                                <td>Mock Test</td>
                                <td>Test {{ $scr_result->chapter_id }}</td>
                                @else
                                <td>Chapter {{ substr($scr_result->chapter_id, 1, 1) }}</td>
                                <td>Test {{ substr($scr_result->chapter_id, 3) }}</td>
                                @endif
                                <td>
                                    <i class="bi bi-check-circle-fill" style="color: green;"></i>
                                    <span class="ms-1">Completed</span>
                                </td>
                                <td>
                                    <b>
                                        <a href="{{ url('result/' . $scr_result->chapter_id) }}" class="text-white"
                                            style="background-color: rgba(0, 128, 0, 0.788); 
                                 text-decoration: none; 
                                 padding: 4px 12px; 
                                 font-size: 12px;
                                 border-top-left-radius: 10px;
                                 border:4px double white;
                                 border-bottom-right-radius: 10px;
                                 display: inline-flex; align-items: center;">
                                            <i class="bi bi-eye text-white"></i>
                                            <span class="ms-1">View Results</span>
                                        </a>
                                    </b>

                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><br><br>

    {{-- for learning objectives --}}
    <div class="m-4 border shadow-md">
        <h2 class="text-center m-3">Learning Objective Results</h2>
        <div class="container">
            <div class="panel">
                <div class="table-responsive ">
                    <table id="learningObjectiveTable" class="table  text-center table-bordered table-hover ">
                        <thead style="">
                            <tr>
                                <th>S.No.</th>
                                <th>User Id</th>
                                <th>Lesson</th>
                                <th>Learning Objective</th>
                                <th>Status</th>
                                <th>Results</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($learning_obj_results as $key => $result)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Auth::user()->email }}</td>
                                    <td>Lesson {{ substr($result->test, 7) }}</td>
                                    <td>Learning Objective {{ substr($result->chapter_id, 3) }}</td>
                                    <td>
                                        <i class="bi bi-check-circle-fill" style="color: green;"></i>
                                        <span class="ms-1">Completed</span>
                                    </td>
                                    <td>
                                        <b>
                                            <a href="{{ url('learning_obj_result/' . $result->chapter_id . '/' . $result->test) }}"
                                                class="text-white"
                                                style="background-color: rgba(0, 128, 0, 0.788); 
                                     text-decoration: none; 
                                     padding: 4px 12px; 
                                     font-size: 12px;
                                     border-top-left-radius: 10px;
                                     border:4px double white;
                                     border-bottom-right-radius: 10px;
                                     display: inline-flex; align-items: center;">
                                                <i class="bi bi-eye text-white"></i>
                                                <span class="ms-1">View Results</span>
                                            </a>
                                        </b>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody><br>
                    </table>
                </div>
            </div>
        </div>
    </div><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#scrQuestionBankTable').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });

            $('#learningObjectiveTable').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    </script>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
