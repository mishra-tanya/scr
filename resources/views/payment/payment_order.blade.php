<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .payment-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .payment-container h1 {
            color: #343a40;
            margin-bottom: 20px;
        }

        .payment-container hr {
            border: 1px solid #28a745;
            margin-bottom: 20px;
        }

        .user-info {
            margin-bottom: 20px;
            text-align: left;
            font-size: 16px;
            color: #495057;
        }

        .user-info p {
            margin: 10px 0;
        }

        .pay-button {
            background-color: #28a745;
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .pay-button:hover {
            background-color: #218838;
        }

        .pay-button:active {
            background-color: #1e7e34;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>

    @include('nav')
<br><br>
    <div class="payment-container mt-5">
        <h1><i class="bi bi-credit-card"></i> Payment Details</h1>
        <hr>
        <div class="user-info">
            <p class="text-center"><strong>Are you sure these details are correct?</strong></p>
            <p class="text-capitalize"><strong>First Name:</strong> {{ Auth::user()->first_name }}</p>
            @if (Auth::user()->last_name)
                <p class="text-capitalize"><strong>Last Name:</strong> {{ Auth::user()->last_name }}</p>
            @endif
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>From IndiaESG.org</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>SCR Preparation Module</td>
                        <td>4000<i class="bi bi-currency-rupee"></i></td>
                    </tr>
                </tbody>
            </table>
            <p class="text-right"><strong>Total Payment:</strong> 4000<i class="bi bi-currency-rupee"></i></p>
        </div>
        <form id="razorpay-form" action="{{ route('payment.callback') }}" method="POST">
            @csrf
            <input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
            <button id="pay-button" class="pay-button">Pay Now</button>
        </form>
    </div>

    <script>
        document.getElementById('pay-button').onclick = function(e) {
            e.preventDefault();

            var options = {
                "key": "{{ $razorpayKey }}",
                "amount": "{{ $order->amount }}",
                "currency": "{{ $order->currency }}",
                "name": "IndiaESG.org : SCR",
                "description": "Scr-Prep userId: {{ Auth::user()->email }}",
                "order_id": "{{ $order->id }}",
                "handler": function(response) {
                    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                    document.getElementById('razorpay-form').submit();
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        };
    </script>
</body>
</html>
