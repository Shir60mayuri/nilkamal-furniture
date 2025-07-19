<!DOCTYPE html>
<html>
<head>
    <title>Nilkamal Furniture</title>
    
    <style>
        

        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        h1 { text-align: center; }
        .products-container { display: flex; flex-wrap: wrap; justify-content: center; }
        .product {
            background: #fff;
            padding: 15px;
            margin: 10px;
            border-radius: 5px;
            width: 200px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .product img { width: 100%; height: 150px; object-fit: cover; border-radius: 5px; }
        .price { color: green; font-weight: bold; margin-top: 5px; }
    </style>
</head>
<body>
    <h1>Nilkamal Furniture</h1>
    <p>Premium quality furniture for your home & office</p>

    <h2>Our Products</h2>

    <div class="products-container">
        @foreach($products as $product)
            <div class="product">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">

                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p class="price">₹{{ $product->price }}</p>

                <!-- ✅ Add-to-cart button should be here -->
                <form action="/add-to-cart/{{ $product->id }}" method="POST">
                    @csrf
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>

    <div style="text-align:center; margin-top:20px;">
        <a href="/cart">View Cart</a>
    </div>

</body>
</html>
