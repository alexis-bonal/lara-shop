@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Coupons</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Remise</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->discount }}€</td>
                        <td>
                            <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary mb-3">Ajouter un Coupon</a>
    </div>
@endsection
