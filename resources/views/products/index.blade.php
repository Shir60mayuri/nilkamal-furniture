<!DOCTYPE html>
<html>
<head>
    <title>Nilkamal Furniture</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; margin: 0; }
        nav {
    background: #003866cf; /* Nilkamal Blue */
    padding: 12px;
    text-align: center;
}
nav a {
    color: white;
    text-decoration: none;
    margin: 0 20px;
    font-weight: bold;
    font-size: 18px;
    transition: color 0.3s ease;
}
nav a:hover {
    color: #ffcc00; /* Hover color (gold) */
}

        .hero {
    background: linear-gradient(135deg, #003366, #0055a5); /* Blue gradient */
    height: 250px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 2rem;
    font-weight: bold;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
}

        
        h2 { text-align: center; margin-top: 20px; }
        .products-container {
            display: flex; flex-wrap: wrap; justify-content: center; padding: 20px;
        }
        .product {
            background: #fff; padding: 15px; margin: 10px; border-radius: 8px;
            width: 200px; text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: 0.3s ease;
        }
        .product:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        .product img {
            width: 100%; height: 150px; object-fit: cover; border-radius: 5px;
        }
        .price { color: green; font-weight: bold; margin-top: 5px; }
        .search-bar {
            text-align: center; margin: 15px;
        }
        .search-bar input {
            padding: 8px; width: 250px;
        }
    </style>
</head>
<body>

    <!-- ✅ Navbar -->
    <nav>
        <nav>
    <a href="/">🏠 Home</a>
    <a href="/products">🪑 Shop</a>
    <a href="/cart">🛒 Cart</a>
    <a href="/wishlist">❤️ Wishlist</a>
</nav>

    </nav>

    <!-- ✅ Hero Banner -->
    <div class="hero">
        Premium Quality Furniture for Your Home & Office
    </div>

    <!-- ✅ Search Bar -->
    <div class="search-bar">
        <input type="text" placeholder="Search furniture...">
    </div>

    <!-- ✅ Product Section -->
    <h2>Our Products</h2>

    <div class="products-container">
        @foreach($products as $product)
            <div class="product">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p class="price">₹{{ $product->price }}</p>
                <form action="/add-to-cart/{{ $product->id }}" method="POST">
                    @csrf
                    <button type="submit">Add to Cart</button>
                    <form action="/add-to-cart/{{ $product->id }}" method="POST">
    @csrf
    <button type="submit">Add to Cart</button>
</form>

<!-- ✅ New Wishlist Button -->
<form action="/add-to-wishlist/{{ $product->id }}" method="POST" style="margin-top:5px;">
    @csrf
    <button type="submit">❤️ Add to Wishlist</button>
</form>

                </form>
            </div>
        @endforeach
    </div>

</body>
</html>
