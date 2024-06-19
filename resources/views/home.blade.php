@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4"> LaraShop pour l'innovation !</h1>
    <p class="lead">Plongez dans un univers où la technologie rencontre le style. Avec LaraShop, accédez à une sélection exclusive de gadgets Apple, des derniers iPhone aux MacBook révolutionnaires, le tout à des prix irrésistibles.</p>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="{{ url('/products') }}" role="button">Découvrez nos produits</a>
</div>
<div class="container-custom">
    <h2 class="my-4">Produits en vedette</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }} €</p>
  <form action="{{ route('cart.add', ['id' => $product->id, 'quantity' => 1]) }}" method="POST">
    @csrf
    <input type="hidden" name="quantity" value="1">
    <button type="submit" class="btn btn-outline-warning">🛒</button>
</form>
                   </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
