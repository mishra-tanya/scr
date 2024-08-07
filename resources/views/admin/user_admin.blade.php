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
    @include('admin/admin_nav')
<br><br>
<br>


    <div class="m-4 border shadow-md">
        <h2 class="text-center " style="background-color: rgb(255, 255, 255); padding: 12px;">All Users
        </h2>
        <div class="container">
            <div class="panel">
                <div class="table-responsive">
                    
@if (session('success'))
<script>
    window.onload = function() {
        alert("{{ session('success') }}");
        window.location.href = "{{ url()->previous() }}"; 
    };
</script>
@endif
<div class="row mb-3 " style="display: flex;justify-content:center;align-items:center;">
    <div class="col-md-2">
        <div class="bg-primary text-white text-center">
        For Paid Users
        </div>
    </div>
    <div class="col-md-3">
        <div class="bg-danger text-white text-center">
            For Deactivated Accounts
            </div>
    </div>
</div>
<table id="all_user" class="table table-hover  text-center table-bordered table-condensed">
                        <thead style="">
                            <tr>
                                <th>S.No.</th>
                                <th>Account Status</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Contact</th>
                                <th>User Address</th>
                                <th>Country</th>
                                <th>Designation</th>
                                <th>Overall Scr Result</th>
                                <th>Overall Learning Obj Result</th>
                                <th>Payment Status</th>
                                <th>Payment Id</th>
                                <th>Update Payment Status</th>
                                <th>Trial Days</th>
                                <th>Registered On </th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            @php
                            $rowClass = '';
                            if ($user->deactivated) {
                                $rowClass = 'table-danger'; 
                            } elseif ($user->payment_status == 1) {
                                $rowClass = 'table-primary'; 
                            }
                        @endphp
                        <tr class="{{ $rowClass }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <form action="{{ route('admin.toggleAccountStatus') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ $user->email }}">
                                            @if ($user->deactivated)
                                                <button type="submit" class="btn btn-sm btn-warning">Activate</button>
                                            @else
                                                <button type="submit" class="btn btn-sm btn-danger">Deactivate</button>
                                            @endif
                                        </form>
                                    </td>
                                    <td class="text-capitalize">{{ $user->first_name." ".$user->last_name  }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->contact_no }}</td>
                                    <td class="text-capitalize">{{ $user->address }}</td>
                                    <td class="text-capitalize">{{ $user->country }}</td>
                                    <td class="text-capitalize">{{ $user->designation }}</td>
                                    <td>{{ $user->scr}} %</td>
                                    <td>{{ $user->learning_obj}} %</td>
                                    <td>@if ($user->payment_status==1)
                                        Paid
                                    @else
                                        Unpaid
                                    @endif</td>
                                    <td>{{$user->payment_id}}</td>
                                    <td>
                                        @if ($user->payment_status == 0)
                                            <form action="{{ route('admin.updatePaymentStatus') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="email" value="{{ $user->email }}">
                                                <button type="submit" class="btn btn-sm btn-success">Mark as Paid</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>{{$user->trial_days}}</td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td><a href="{{ url('/admin/user/' . $user->email) }}">View</a></td>
                                    {{-- <td>{{ $user->payment_status }}</td> --}}
                                    {{-- <td>{{ $user->trial_days }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><br><br>

    <div class="m-4 border shadow-md">
        <h2 class="text-center " style="background-color: rgb(255, 255, 255); padding: 12px;">All Admins
        </h2>
        <div class="container">
            <div class="panel">
                <div class="table-responsive">
                    <table id="all_admin" class="table table-hover  text-center table-bordered table-condensed">
                        <thead style="">
                            <tr>
                                <th>S.No.</th>
                                <th>Admin Name</th>
                                <th>Admin Email</th>
                                <th>Admin Address</th>
                                <th>Admin Contact</th>
                                <th>Country</th>
                                <th>Designation</th>
                                {{-- <th>Update</th>
                                <th>Delete</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $index => $admin)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-capitalize">{{ $admin->first_name." ".$admin->last_name  }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td class="text-capitalize">{{ $admin->address }}</td>
                                    <td></td>
                                    <td class="text-capitalize">{{ $admin->country }}</td>
                                    <td class="text-capitalize">{{ $admin->designation }}</td>
                                    {{-- <td></td>
                                    <td></td> --}}
                                    {{-- <td>{{ $user->payment_status }}</td> --}}
                                    {{-- <td>{{ $user->trial_days }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div><br><br>
@include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
          
            $('#all_user').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });

             
            $('#all_admin').DataTable({
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
