<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
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
    @include('admin/admin_nav')
    <div class="container mt-4">
        <br><br><br>
        <h2 class="text-center text-capitalize" style="text-decoration: underline"><b>{{ $user->first_name }} {{ $user->last_name }}</b></h2>
        @if(Session::has('email_success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('email_success') }}
        </div>
        @endif
        <br>
        <div class="card mb-4">
            <div class="card-header" style="font-size: 24px;"><i class="bi bi-person-circle"></i> User Information</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="text-capitalize"><strong>User Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="text-capitalize"><strong>Contact:</strong> {{ $user->contact_no }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="text-capitalize"><strong>Address:</strong> {{ $user->address }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="text-capitalize"><strong>Country:</strong> {{ $user->country }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="text-capitalize"><strong>Designation:</strong> {{ $user->designation }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p><strong>Overall Scr Result:</strong> {{ $user->scr }} %</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p><strong>Overall Learning Obj Result:</strong> {{ $user->learning_obj }} %</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p><strong>Payment Status:</strong> {{ $user->payment_status == 1 ? 'Paid' : 'Unpaid' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        @if ($user->payment_status == 0)
                        <p><strong>Trial Days:</strong> {{ $user->trial_days }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header" style="font-size: 24px;"><i class="bi bi-pencil-square"></i> Learning Objective Results</div>
            <div class="card-body">
                @if ($loResults->isEmpty())
                    <p>No learning objective results found.</p>
                @else
                    <div class="table-responsive">
                        <table id="lo" class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Chapter</th>
                                    <th>Learning Objective</th>
                                    <th>Correct Questions</th>
                                    <th>Total Questions</th>
                                    <th>Score</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loResults as $i => $result)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>Chapter {{ substr($result->test, 7) }}</td>
                                    <td>Learning Objective {{ substr($result->chapter_id, 3) }}</td>
                                    <td>{{ $result->score }}</td>
                                    <td>{{ $result->total_q }}</td>
                                    <td>{{ $result->score/$result->total_q *100 }} %</td>
                                    <td>{{ $result->created_at->format('Y-m-d') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header" style="font-size: 24px;"><i class="bi bi-pencil-square"></i> SCR Results</div>
            <div class="card-body">
                @if ($results->isEmpty())
                    <p>No results found.</p>
                @else
                    <div class="table-responsive">
                        <table id="scr" class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Chapter</th>
                                    <th>Test</th>
                                    <th>Correct Questions</th>
                                    <th>Total Quuestions</th>
                                    <th>Score</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $i => $result)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    @if (is_numeric($result->chapter_id))
                                        <td> Mock Test</td>
                                        <td>Mock Test {{ $result->chapter_id }}</td>
                                    @else
                                        <td>Chapter {{ substr($result->chapter_id, 1, 1) }}</td>
                                        <td> Test Series {{ substr($result->chapter_id, 3, 1) }}</td>
                                    @endif
                                    <td>{{ $result->score }} </td>
                                    <td>{{ $result->total_question }}</td>
                                    <td>{{ number_format($result->score / $result->total_question * 100, 1) }} %</td>
                                    <td>{{ $result->created_at->format('Y-m-d') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- Add a new card for composing and sending emails -->
        <div class="card mb-4">
            <div class="card-header" style="font-size: 24px;"><i class="bi bi-envelope"></i> Send Email</div>
            <div class="card-body">
                <form action="{{ route('admin.send.email', $user->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Email</button>
                </form>
            </div>
        </div>

    </div>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#lo').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });

            $('#scr').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    </script>
</body>

</html>
