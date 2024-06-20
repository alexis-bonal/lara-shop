@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le Coupon</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="code">Code :</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ $coupon->code }}" required>
            </div>
            <div class="form-group">
                <label for="discount">Remise :</label>
                <input type="number" class="form-control" id="discount" name="discount" value="{{ $coupon->discount }}" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
