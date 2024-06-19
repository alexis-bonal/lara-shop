@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Votre panier</h1>

    <!-- Espace réservé pour les notifications -->
    <div class="mb-4" style="height: 60px;">
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
    </div>

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
                        <td>{{ $details['name'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control" style="width: 70px;">
                                <button type="submit" class="btn btn-primary btn-sm mt-1">Mettre à jour</button>
                            </form>
                        </td>
                        <td>${{ $details['price'] }}</td>
                        <td>${{ $details['price'] * $details['quantity'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total mt-3">
            <h3>Total: {{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) }} €</h3>
        </div>

        <div class="checkout mt-4">
            <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-sm mt-1">Commander</a>
        </div>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection
