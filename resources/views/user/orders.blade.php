@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes commandes</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($orders->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Détails</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
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
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a href="{{ route('user.order.details', $order->id) }}" class="btn btn-primary btn-sm">Voir les détails</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Vous n'avez passé aucune commande.</p>
    @endif
</div>
@endsection
