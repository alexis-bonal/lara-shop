@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer un Coupon</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        Le code à déjà était renseigné. Merci de réessayer.
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.coupons.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="code">Code :</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required>
            </div>
            <div class="form-group">
                <label for="discount">Remise :</label>
                <input type="number" class="form-control" id="discount" name="discount" value="{{ old('discount') }}" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection
