<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCR: Flash Cards</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }
        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, color 0.3s ease;
            cursor: pointer;
            text-decoration: none;
        }
        .card:hover {
            transform: scale(1.05);
            color: #2487ce; /* Green color on hover */
        }
        .card-header {
            font-weight: bold;
        }
        .card-body {
            padding: 1.25rem;
        }
        .flash-card-container {
            margin: 30px auto;
        }
        .flash-card {
            margin-bottom: 20px;
        }
        .card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>
    @include('nav')
    <br><br><br>
    <h2 class="text-center mb-4" style="background-color: rgb(235, 235, 235); padding: 12px; border-radius: 0.5rem;">
        <b>Learning Objective Flash Cards for Chapter {{ $chapter }}</b>
    </h2>
    <div class="container flash-card-container">
        <div class="row">
            @foreach ($flash_chapter_notes as $i => $flash_lo)
                <div class="col-md-4 mt-4 flash-card">
                    <a href="{{ route('flash_card_detail', ['id' => $flash_lo->url,'chapter'=>'Chapter'.$chapter] ) }}" class="card-link">
                        <div class="card">
                            <div class="card-header p-3 text-center text-white" style="background-color: #2487ce">
                                Learning Objective {{ $i+1 }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $flash_lo->title }}</h5>
                               
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    @include('footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
