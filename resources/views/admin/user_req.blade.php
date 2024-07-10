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
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css"> --}}
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    {{-- <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> --}}

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap');

        table th {
            background: #2487ce !important;
            color: white !important;
            text-align: center;
            vertical-align: middle;
        }

        
        .m-3 i{
            font-size:40px;
        }
    </style>
</head>

<body>
<br><br>
    <div class="m-3">
        <div class="grey-bg container-fluid">
            <section id="minimal-statistics">
                <div class="row">
                    <div class="col-12 mt-3 mb-1">
                        <h4 class="text-uppercase text-center">Quick Overview DashBoard</h4>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="icon-pencil primary font-large-2 float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3>{{ $totalLearningObjectiveQuestions}}</h3>
                                            <span>Total Learning Objective Questions</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="icon-pencil danger font-large-2 float-left"></i>
                                        </div>
                                       
                                        <div class="media-body text-right">
                                            <h3>{{$totalSCRQuestionsAdded}}</h3>
                                            <span>Total SCR Questions Added</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="icon-user primary font-large-2 float-left"></i>
                                        </div>
                                       
                                        <div class="media-body text-right">
                                            <h3>{{$totalUsers}}</h3>
                                            <span>Total Users</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="icon-user danger font-large-2 float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3>{{$totalPaidUsers}}</h3>
                                            <span>Total Paid Users</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <br>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">{{$totalTrialRequests}}</h3>
                                            <span>Total Trial Requests</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-rocket danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">{{$newUsersToday}}</h3>
                                            <span>New Users Today</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-graph success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <br>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">{{$totalAdmins}}</h3>
                                            <span>Total Admins</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                       
                                        <div class="media-body text-left">
                                            <h3 class="primary">{{$totalChapters}}</h3>
                                            <span>Total Chapters</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-support primary font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <br>
               
            </section>
    
           
        </div>
    </div>
   
<br><br><br><br>
    {{--  trial requested users --}}
    <div class="m-4 border shadow-md" id="trial">
        <h2 class="text-center "  style="background-color: rgb(255, 255, 255); padding: 12px;">User's Trial Requests
        </h2>
      
        <div class="container">
            <div class="panel">
                <div class="table-responsive">
                    @if(session('success'))
                    <div class="alert alert-warning">
                        {{ session('success') }}
                    </div>
                @endif
                    <table id="pay_user" class="table  text-center table-bordered table-condensed">
                        <thead style="">
                            <tr>
                                <th>S.No.</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Contact No.</th>
                                <th>Country</th>
                                <th>Address</th>
                                <th>Designation</th>
                                <th>Status</th>
                                <th>Req. Days</th>
                                <th>Increase Trial Days</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach($trialRequests as $index => $trialRequest)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $trialRequest->first_name ." ". $trialRequest->last_name }}</td>
                                <td class="text-lowercase">{{ $trialRequest->email }}</td>
                                <td>{{ $trialRequest->contact_no }}</td>
                                <td>{{ $trialRequest->country }}</td>
                                <td>{{ $trialRequest->address ?? 'N/A' }}</td>
                                <td>{{ $trialRequest->designation }}</td>
                                {{-- <td>{{ $trialRequest->payment_status ?? 'N/A' }}</td> --}}
                                <td>
                                    @if ($trialRequest->approved)
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Not Approved</span>
                                    @endif
                                </td>
                                <td>{{ $trialRequest->trial_days }}</td>
                                <td>
                                    <form action="{{ route('update.trial.days', $trialRequest->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <input type="number" name="trial_days" class="form-control p-2" value="{{ $trialRequest->trial_days }}" required>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
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
            $('#pay_user').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
            $('#all_user').DataTable({
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
