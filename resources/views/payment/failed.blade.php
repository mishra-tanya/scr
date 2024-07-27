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
    max-width: 240px;
    text-align: center;
    /* margin: 20px auto; */
    border-radius: 10px;
    background-color: #fff;
    position: relative;
    animation: fadeIn 1s ease-in-out;
}

.message-box i {
    font-size: 110px;
    margin-bottom: 30px;
    animation: scaleInOut 2s infinite;
}

._failed {
    border-bottom: solid 4px rgb(255, 162, 162);
}

._failed i {
    color:  rgb(255, 162, 162);
}

._failed h2 {
    margin: 12px 0;
    font-size: 24px;
    font-weight: 500;
}

._failed p {
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
        <div class="message-box _failed">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
            <h2>Your payment failed</h2>
            <p>Try again later.</p> 
            <p>Go to previous page <a href={{url('payment')}}>Here</a></p>
        </div> 
    </div>
</body>
</html>
