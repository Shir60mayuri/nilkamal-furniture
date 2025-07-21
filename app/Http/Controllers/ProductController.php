<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // ✅ Show all products on /products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // ✅ Add a product to the cart (stored in session)
    public function addToCart($id)
    {
        $cart = session()->get('cart', []);   // get existing cart or empty array
        $cart[$id] = ($cart[$id] ?? 0) + 1;   // increase quantity if already added
        session(['cart' => $cart]);           // save back to session

        return redirect()->back()->with('success', '✅ Product added to cart!');
    }

    // ✅ View the cart page
    public function viewCart()
    {
        $cart = session()->get('cart', []); // get current cart
        $cartProducts = [];
        $total = 0;

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                $product->quantity = $quantity;
                $product->subtotal = $product->price * $quantity;
                $cartProducts[] = $product;
                $total += $product->subtotal;
            }
        }

        return view('products.cart', [
            'cartProducts' => $cartProducts,
            'total' => $total
        ]);
    }

    // ✅ Add product to wishlist
    public function addToWishlist($id)
    {
        $wishlist = session()->get('wishlist', []);

        if (!in_array($id, $wishlist)) {
            $wishlist[] = $id; // add only once
        }

        session(['wishlist' => $wishlist]);

        return redirect()->back()->with('success', '✅ Product added to Wishlist!');
    }

    // ✅ View wishlist
    public function viewWishlist()
    {
        $wishlist = session()->get('wishlist', []);
        $wishlistProducts = Product::whereIn('id', $wishlist)->get();

        return view('products.wishlist', compact('wishlistProducts'));
    }
}
