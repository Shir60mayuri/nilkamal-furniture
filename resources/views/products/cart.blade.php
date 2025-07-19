<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f4f4f4; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
    <h1>Your Cart</h1>

    @if(count($products) > 0)
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
            @foreach($products as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $cart[$p->id] }}</td>
                    <td>₹{{ $p->price }}</td>
                    <td>₹{{ $p->price * $cart[$p->id] }}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td colspan="3">Total</td>
                <td>₹{{ $total }}</td>
            </tr>
        </table>

        <br>
        <a href="/cart/clear">Clear Cart</a> | <a href="/">Continue Shopping</a>

    @else
        <p>Your cart is empty.</p>
        <a href="/">Go back to products</a>
    @endif
</body>
</html>
