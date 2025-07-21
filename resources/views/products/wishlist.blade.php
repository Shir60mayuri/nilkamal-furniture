<!DOCTYPE html>
<html>
<head>
    <title>My Wishlist</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        h1 { text-align: center; }
        .products-container {
            display: flex; flex-wrap: wrap; justify-content: center;
        }
        .product {
            background: #fff; padding: 15px; margin: 10px;
            border-radius: 8px; width: 200px; text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .product img {
            width: 100%; height: 150px; object-fit: cover;
            border-radius: 5px;
        }
        .price { color: green; font-weight: bold; margin-top: 5px; }
    </style>
</head>
<body>
    <h1>❤️ My Wishlist</h1>

    <div class="products-container">
        @forelse($wishlistProducts as $product)
            <div class="product">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p class="price">₹{{ $product->price }}</p>
                
                <!-- Add to Cart directly from Wishlist -->
                <form action="/add-to-cart/{{ $product->id }}" method="POST">
                    @csrf
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        @empty
            <p style="text-align:center;">No products in wishlist yet!</p>
        @endforelse
    </div>

    <div style="text-align:center; margin-top:20px;">
        <a href="/products">⬅ Back to Products</a>
    </div>
</body>
</html>
