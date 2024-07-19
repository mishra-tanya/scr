<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SCR Chapter Notes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body{
            font-size:20px;
        }
        .note-content p {
            position: relative;
            padding-left: 20px; 
        }

        .note-content p::before {
            content: '•';  
            color: green;  
            position: absolute;  
            left: 0;  
            top: 0;  
            font-size: 1.5em; 
            line-height: 1; 
        }
        .h_tag{
            font-size:30px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            margin-top: 30px;
            color:green;
            text-decoration: underline;

        }
    </style>
</head>
<body>
    @include('nav')
    <br><br>
    <div class="mt-3">
        <h1 class="text-center mb-4" style="background-color: rgb(235, 235, 235); padding: 12px;">
          <b>{{ $chapter_notes->title }}</b> 
        </h1>
    </div>

    <div class="container mt-4">
        <div class="card p-2">
            <div class="card-body ">
                
                <div class="note-content">
                    {!! $chapter_notes->code !!}
                </div>
            </div>
        </div>
    </div>
    <br><br>
    @include('footer')
</body>
</html>
