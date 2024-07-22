<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>SCR: Flash Notes</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            padding-top: 20px;
            
        }

        .card {
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            width: 100%;
            border: 2px #2487ce solid ;
            text-decoration: none;
            color: black;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-content {
            padding: 20px;
        }

        .custom-btn {
            background-color: #2487ce;
            color: #fff;
            width: 100%;
            border: none;
            font-size: 13px;
            border-radius: 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .custom-btn:hover {
            background-color: #0095b3;
        }

        hr {
            border: 1px solid rgb(0, 0, 0);
            border-radius: 100%;
            border-top: 1px dotted #000000;
        }

        @media (max-width: 920px) {
            .custom-btn {
                width: 100%;
            }
            .card-content {
                padding: 10px;
            }
        }

        .notestitle:hover {
            color: #0095b3;
            font-size: 500px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    @include('nav')
    <br>
    <div class="mt-4">
        <h2 class="text-center mb-4" style="background-color: rgb(235, 235, 235); padding: 12px;">
            SCR Revision Flash Cards
        </h2>
    </div>

    <div class="container mt-4"><br><br>
        <div class="row" style="display:flex;justify-content:center; align-items:center; ">
            @for($i=1;$i<=10;$i++)
            <div class="col-md-3 text-center" >
                <form action="{{ route('store.notes') }}" method="POST">
                    @csrf
                    <input type="hidden" name="chapter" value="flash_chapter_{{$i}}">
                    {{-- {{dd("flash_chapter_".$i, $chapterNotes)}} --}}
                    <button type="submit" class="card mb-4 p-1" style="font-size:3000px;background-color: {{ in_array("flash_chapter_".$i, $chapterNotes) ? '#9dcee0' : '#f5f5f5' }}">
                        <div class="card-content p-4 notestitle text-center"  >
                            <h2 class="card-title p-3" ><b> 
                                <i class="bi bi-pencil-square "></i>&nbsp;&nbsp;&nbsp;
                            Chapter {{ $i}}</b></h2>
                        </div>
                    </button>
                </form>
            </div>
            @endfor
        </div>
    </div>
    <br><br><br>

    @include('footer')

    <script>
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        });
    </script>
</body>

</html>
