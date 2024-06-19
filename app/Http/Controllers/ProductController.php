<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('sort_by')) {
            $sortBy = $request->sort_by;
            $sortOrder = $request->sort_order ?? 'asc';
            $query->orderBy($sortBy, $sortOrder);
        }

        $products = $query->get();

        return view('products', compact('products'));
    }

    public function category($category)
    {
        $category = Category::where('name', $category)->first();
        $products = $category->products;
        return view('products.category', compact('category', 'products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
