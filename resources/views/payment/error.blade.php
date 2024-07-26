<!DOCTYPE html>
<html>
<head>
    <title>Order Error</title>
    <!-- Include any CSS for notification styling -->
    <style>
        .notification {
            display: none;
            position: fixed;
            top: 10px;
            right: 10px;
            padding: 10px;
            background-color: #f44336; /* Red color */
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Your page content -->

    <!-- Notification element -->
    <div id="notification" class="notification">
        {{ $errorMessage }}
    </div>

    <script>
        // Show the notification if there's an error message
        document.addEventListener('DOMContentLoaded', function() {
            var errorMessage = @json($errorMessage);
            if (errorMessage) {
                var notification = document.getElementById('notification');
                notification.style.display = 'block';
                setTimeout(function() {
                    notification.style.display = 'none';
                }, 5000); // Hide the notification after 5 seconds
            }
        });
    </script>
</body>
</html>
