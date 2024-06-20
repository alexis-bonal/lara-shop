@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gérer les Commandes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->total_price }} €</td>
                        <td>
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
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                <select name="status" class="form-control">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>En cours</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Terminé</option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Expédié</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Livré</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Mettre à jour</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
