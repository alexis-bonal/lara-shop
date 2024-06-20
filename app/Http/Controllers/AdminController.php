<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }

    public function create()
    {
        return view('admin.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }

    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $imagePath,
    ]);

    return redirect()->route('admin.index')
                    ->with('success', 'Product created successfully.');
}


    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::find($id);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            // Sauvegarder la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('admin.index')
                        ->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('admin.index')
                        ->with('success', 'Product deleted successfully.');
    }

    public function orders()
        {
            $orders = Order::all();
            return view('admin.orders.index', compact('orders'));
        }

        public function updateOrderStatus(Request $request, $id)
        {
            $request->validate([
                'status' => 'required|in:pending,processing,completed,shipped,delivered',
            ]);

            $order = Order::find($id);
            $order->status = $request->status;
            $order->save();

            return redirect()->route('admin.orders.index')
                            ->with('success', 'Order status updated successfully.');
        }
}
