<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
</head>
<body>
    <h1>Quiz Results</h1>
    <h2>Chapter: {{ $chapter_id }}</h2>
    <h2>Test Series: {{ $test_series_id }}</h2>

    <table >
        <tr>
            <th>Question ID</th>
            <th>Selected Option</th>
        </tr>
        @foreach ($responses as $response)
        <tr>
            <td>{{ $response->question_id }}</td>
            <td>{{ $response->selected_option }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
