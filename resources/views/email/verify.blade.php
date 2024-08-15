<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h2>Thank you for registering!</h2>
    <p>Please click the link below to verify your email address:</p>
    <a href="{{ route('verify', ['token' => $token]) }}">Verify Email</a>
    <br><br>
    <span>
    From
    </span><br>
    <span>SCR Preparation Module</span><br>
    <span>Indiaesg.org</span>
</body>
</html>
