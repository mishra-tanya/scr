<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome, {{ $user->first_name }}</h1>
    
    <!-- Display other user details -->
    <p>Email: {{ $user->email }}</p>
    <p>Address: {{ $user->address }}</p>
    <!-- Add more details as needed -->
</body>
</html>
