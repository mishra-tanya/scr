<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

</head>
<style>
      table th {
            background: #2487ce !important;
            color: white !important;
            text-align: center;
            vertical-align: middle;
        }
</style>
<body>
    @include('admin.admin_nav')
    <br><br>
    <div class="container text-center mt-5">
        <h1 class="mb-4 "><b >Contact Messages</b>  </h1>
        <hr><br>
            <p>Of Date: <b>{{ $date }}</b></p>
        <form action="{{ route('contact.messages') }}" method="GET" class="mb-4">
            <div class="row" style="display: flex; justify-content:center;align-items:center;">
                <div class=" col-9 col-md-3">
                    <input type="date" name="date" class="form-control" value="{{ $date }}">
                </div>
                <div class="col-3 col-md-1">
                    <button type="submit" class=" px-2"
                        style="background-color: #2487ce;
                            border: none;
                            color: white;
                            padding: 6px;
                            border-radius: 2px;
                        ">Search</button>
                </div>
            </div>
        </form>

        @if ($messages->isEmpty())
            <div class="alert alert-info">No messages found for the selected date.</div>
        @else
            <div class="table-responsive card p-4">
                <table id="contact" class="table table-hover text-capitalize  text-center table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $i => $message)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $message->name }}</td>
                                <td class="text-lowercase">{{ $message->email }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ \Carbon\Carbon::parse($message->created_at)->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        @endif
    </div>
    </div>
<br><br>
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
          
            $('#contact').DataTable({
                "order": [
                    [0, "asc"]
                ]
            });

           
        });
    </script>
</body>

</html>
