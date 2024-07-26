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

        .phonepay-button {
            background-color: rgb(95, 37, 159);
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            max-width: 162px;
            transition: background-color 0.3s ease;
        }

        .phonepay-button:hover {
            background-color: rgba(96, 37, 159, 0.785);
        }

        .phonepay-button:active {
            background-color: rgb(62, 8, 120);
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
    <div class="payment-container mt-5"><br>
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
      <div class="row">
        <div class="col-6  mt-2">
            <form id="razorpay-form" action="{{ route('payment.callback') }}" method="POST">
                @csrf
                <input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                <button id="pay-button" class="pay-button">Pay Using Razorpay</button>
            </form>
        </div>
        <div class="col-6  mt-2">
            <form action="{{ route('phonepe.initiate') }}" method="POST">
                @csrf
                {{-- <input type="hidden" name="amount" value="4000"> --}}
                <input type="hidden" name="customer_name" value="{{ Auth::user()->first_name }}">
                <input type="hidden" name="customer_email" value="{{ Auth::user()->email }}">
                <input type="hidden" name="customer_phone" value="{{ Auth::user()->contact }}">
                <button class="phonepay-button"  type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M10.206 9.941h2.949v4.692c-.402.201-.938.268-1.34.268c-1.072 0-1.609-.536-1.609-1.743zm13.47 4.816c-1.523 6.449-7.985 10.442-14.433 8.919C2.794 22.154-1.199 15.691.324 9.243C1.847 2.794 8.309-1.199 14.757.324c6.449 1.523 10.442 7.985 8.919 14.433m-6.231-5.888a.887.887 0 0 0-.871-.871h-1.609l-3.686-4.222c-.335-.402-.871-.536-1.407-.402l-1.274.401c-.201.067-.268.335-.134.469l4.021 3.82H6.386c-.201 0-.335.134-.335.335v.67c0 .469.402.871.871.871h.938v3.217c0 2.413 1.273 3.82 3.418 3.82c.67 0 1.206-.067 1.877-.335v2.145c0 .603.469 1.072 1.072 1.072h.938a.43.43 0 0 0 .402-.402V9.874h1.542c.201 0 .335-.134.335-.335z"/></svg>
                    Pay Using PhonePe</button>
            </form>
        </div>
      </div>
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
