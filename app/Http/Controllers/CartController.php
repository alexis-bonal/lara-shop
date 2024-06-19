<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the cart contents.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    /**
     * Add a product to the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */   
     public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $request->quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', "{$cart[$id]['name']} ajouté au panier avec succès");
    }
    /**
     * Update the specified item in the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $productName = $cart[$id]['name'];
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', "Quantité du produit {$cart[$id]['name']} mise à jour x{$request->quantity}.");
        }

        return redirect()->route('cart.index')->with('error', 'Produit non trouvé dans le panier.');
    }




    /**
     * Remove the specified item from the cart.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Remove the specified item from the cart.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $productName = $cart[$id]['name'];
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', "{$productName} supprimé.");
        }

        return redirect()->route('cart.index')->with('error', 'Produit non trouvé dans le panier.');
    }

    /**
     * Apply a coupon to the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();

        if (!$coupon) {
            return redirect()->route('cart.index')->with('error', 'Invalid coupon code.');
        }

        session()->put('coupon', $coupon);
        return redirect()->route('cart.index')->with('success', 'Coupon applied successfully!');
    }

    /**
     * Clear the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {
        session()->forget('cart');
        session()->forget('coupon');
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
    }
}
