<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body, html {
    height: 100%;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f0f0f0;
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.message-box {
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
    padding: 45px;
    width: 100%;
    max-width: 250px;
    text-align: center;
    margin: 20px auto;
    border-radius: 10px;
    background-color: #fff;
    position: relative;
    animation: fadeIn 1s ease-in-out;
}

.message-box i {
    font-size: 119px;
    animation: scaleInOut 2s infinite;
}

._success {
    border-bottom: solid 4px #28a745;
}

._success i {
    color: #d4edda;
}

._success h2 {
    margin: 12px 0;
    font-size: 24px;
    font-weight: 500;
    line-height: 1.2;
}

._success p {
    font-size: 16px;
    color: #495057;
    font-weight: 500;
}

@keyframes scaleInOut {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

</style>
<body>
    <div class="container">
        <div class="message-box _success">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
            <h2>Your payment was successful</h2><br>
            <p>Thank you for your payment.</p>      
            <p> Payment Id: {{Auth::user()->payment_id}}</p>
            <p>You can redirect to <a href={{url('\home')}}>Dashboard</a> Now</p>
        </div> 
    </div>
</body>
</html>
