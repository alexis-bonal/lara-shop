<!-- resources/views/products.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <form method="GET" action="{{ route('products.index') }}">
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ request('category') }}">
        </div>
        <div class="form-group">
            <label for="sort_by">Sort By:</label>
            <select name="sort_by" id="sort_by" class="form-control">
                <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Price</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sort_order">Sort Order:</label>
            <select name="sort_order" id="sort_order" class="form-control">
                <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Apply Filters</button>
    </form>

    <div class="row mt-4">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">${{ $product->price }}</p>
                        <p class="card-text">Category: {{ $product->category }}</p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
