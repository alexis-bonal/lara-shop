@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">Bienvenue sur notre site E-Commerce!</h1>
    <p class="lead">Découvrez notre large gamme de produits, profitez des promotions spéciales et achetez en toute simplicité.</p>
    <hr class="my-4">
    <p>Parcourez nos catégories et trouvez les meilleures offres du marché.</p>
    <a class="btn btn-primary btn-lg" href="{{ url('/products') }}" role="button">Acheter Maintenant</a>
</div>

<div class="container-custom">
    <h2 class="my-4">Produits en Vedette</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }} €</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
