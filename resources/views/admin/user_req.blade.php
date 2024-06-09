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
<br>
    <div class="m-4 border shadow-md">
        <h2 class="text-center " style="background-color: rgb(255, 255, 255); padding: 12px;">User's Requests
        </h2>
        <div class="container">
            <div class="panel">
                <div class="table-responsive">
                    <table id="scrQuestionBankTable" class="table  text-center table-bordered table-condensed">
                        <thead style="">
                            <tr>
                                <th>S.No.</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Address</th>
                                <th>Payment Status</th>
                                <th>Requested Days</th>
                                <th>Increase Trial Days</th>
                            </tr>
                        </thead>
                        <tbody>
                          
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
        });
    </script>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
