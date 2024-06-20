@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la commande #{{ $order->id }}</h1>
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Statut :</label>
                <select class="form-control" id="status" name="status">
                    <option value="en préparation" {{ $order->status == 'en préparation' ? 'selected' : '' }}>En préparation</option>
                    <option value="en cours" {{ $order->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                    <option value="en livraison" {{ $order->status == 'en livraison' ? 'selected' : '' }}>En livraison</option>
                    <option value="livré" {{ $order->status == 'livré' ? 'selected' : '' }}>Livré</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
