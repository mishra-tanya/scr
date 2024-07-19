<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            font-size: 18px;
            background-color: #f2f2f2;
        }
        .accordion-button {
            font-size: 18px;
            color: #000000;
            background-color: #ffffff;
        }
        .accordion-button:not(.collapsed) {
            color: black;
            background-color: rgb(235, 235, 235);
        }
        .accordion-item {
            margin-bottom: 10px;
        }
       
    </style>
</head>
<body>
    @include('nav')
    <br><br><br>
    <h2 class="text-center mb-4" style="background-color: rgb(235, 235, 235); padding: 12px;">
        <b>   Flash Cards for Chapter {{ $chapter }}</b>
    </h2>
    <div class="container mt-5">
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    @foreach ($flash_chapter_notes as $index => $note)
                        <div class="accordion-item p-2">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                    <b>{{ $index + 1 }}. {{ $note->front }}</b>
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{ $note->back }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
    <br><br><br>
    @include('footer')
</body>
</html>
