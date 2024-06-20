@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la commande #{{ $order->id }}</h1>

    <div class="mb-4">
        @if ($order->coupon_code)
            <h3>Sous-total: {{ $order->total_price + $order->discount }} €</h3>
            <h4>Code Promo: {{ $order->coupon_code }}</h4>
            <h4>Réduction: -{{ $order->discount }} €</h4>
            <h3>Total après réduction: {{ $order->total_price }} €</h3>
        @else
            <h3>Total: {{ $order->total_price }} €</h3>
        @endif
        <h4 class="mt-4">
            Status:
            @switch($order->status)
                @case('pending')
                    En attente
                    @break
                @case('processing')
                    En cours
                    @break
                @case('completed')
                    Terminé
                    @break
                @case('shipped')
                    Expédié
                    @break
                @case('delivered')
                    Livré
                    @break
                @default
                    {{ $order->status }}
            @endswitch
        </h4>
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
