@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Votre panier</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $details)
                    <tr>
                        <td>
                            <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" width="50" height="50">
                            {{ $details['name'] }}
                        </td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control" style="width: 70px;">
                                <button type="submit" class="btn btn-primary btn-sm mt-1">Update</button>
                            </form>
                        </td>
                        <td>${{ $details['price'] }}</td>
                        <td>${{ $details['price'] * $details['quantity'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('cart.coupon') }}" method="POST" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="code">Coupon Code</label>
                <input type="text" name="code" class="form-control" id="code" placeholder="Enter coupon code">
                <button type="submit" class="btn btn-primary btn-sm mt-2">Apply Coupon</button>
            </div>
        </form>

        <form action="{{ route('cart.clear') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-warning btn-sm">Clear Cart</button>
        </form>

        <div class="total mt-3">
            <h3>Total: ${{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) }}</h3>
        </div>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection
