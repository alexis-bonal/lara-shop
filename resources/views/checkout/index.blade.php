@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Validation de la commande</h1>

    <div class="total mt-3">
        <h3>Total: {{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart', []))) }} €</h3>
    </div>

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Commander</button>
    </form>
</div>
@endsection
