<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
public function index()
{
    $products = Product::all();
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
