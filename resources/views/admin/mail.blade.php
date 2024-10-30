<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
    <img width="150px" src="{{public_path('img/logo.png')}}">

    <h1>Order Confirmation</h1>
        <p>Dear {{ $user->name }},</p>
        <p>Thank you for your order! Here are the details:</p>

        <h2>Order Details:</h2>
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Total Amount:</strong> ${{ number_format($order->total_price, 2) }}</p>
        <p><strong>Payment Method:</strong> {{ $order->payment_status }}</p>
        <p><strong>Delivery Status:</strong> {{ $order->delivery_status }}</p>

        <h3>Items Ordered:</h3>
        <ul>
            @foreach ($orderItems as $item)
                <li>{{ $item->product_title }} (Quantity: {{ $item->quantity }}) - ${{ number_format($item->total, 2) }}</li>
            @endforeach
        </ul>

        <p>If you have any questions about your order, feel free to contact us!</p>
        <p>Best regards,<br>RT</p>
    </div>
</body>
</html>