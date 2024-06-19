@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la commande #{{ $order->id }}</h1>

    <div class="mb-4">
        <h3>Total: {{ $order->total_price }} €</h3>
        <h4>Status: {{ $order->status }}</h4>
    </div>

    @if ($order->products->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->pivot->price }} €</td>
                        <td>{{ $product->pivot->price * $product->pivot->quantity }} €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun produit dans cette commande.</p>
    @endif
</div>
@endsection
