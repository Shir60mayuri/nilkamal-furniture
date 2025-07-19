<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    // ✅ Show all products on homepage
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
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // ✅ View the cart page
    public function viewCart()
    {
        $cart = session()->get('cart', []);  // get current cart
        $products = Product::whereIn('id', array_keys($cart))->get(); // fetch products from DB

        // calculate total price
        $total = 0;
        foreach ($products as $p) {
            $total += $p->price * $cart[$p->id];
        }

        return view('products.cart', compact('products', 'cart', 'total'));
    }

    // ✅ Clear the cart
    public function clearCart()
    {
        session()->forget('cart');
        return redirect('/cart')->with('success', 'Cart cleared!');
    }
}
