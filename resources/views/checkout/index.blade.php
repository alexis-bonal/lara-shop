@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Validation de la commande</h1>

    <div class="total mt-3">
        <h3>Sous-total: {{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart', []))) }} €</h3>
        @if(session('discount'))
            <h4>Réduction: -{{ session('discount') }} €</h4>
            <h3>Total après réduction: {{ session('total', array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart', [])))) }} €</h3>
        @else
            <h3>Total: {{ session('total', array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart', [])))) }} €</h3>
        @endif
    </div>

    <form action="{{ route('checkout.applyCoupon') }}" method="POST" class="mb-4">
        @csrf
        <div class="form-group">
            <label for="coupon_code">Code Promo :</label>
            <input type="text" name="coupon_code" id="coupon_code" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-secondary">Appliquer le Code</button>
    </form>

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Commander</button>
    </form>
</div>
@endsection
