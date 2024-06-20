@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Nos produits</h1>
    <form method="GET" action="{{ route('products.index') }}">

        <div class="row">
            <div class="col-md-4 form-group">
                <label for="category">Catégorie:</label>
                <input type="text" name="category" id="category" class="form-control" value="{{ request('category') }}">
            </div>
            <div class="col-md-4 form-group">
                <label for="sort_by">Trier:</label>
                <select name="sort_by" id="sort_by" class="form-control">
                    <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Nom</option>
                    <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Prix</option>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="sort_order">Filtre:</label>
                <select name="sort_order" id="sort_order" class="form-control">
                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Croissant</option>
                    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Décroissant</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Appliquer les filtres</button>
    </form>

    <div class="row mt-4">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">{{ $product->price }} €</p>
                        <p class="card-text">Catégorie: {{ $product->category }}</p>
                        <form id="cart-form-{{ $product->id }}" action="{{ route('cart.add', ['id' => $product->id, 'quantity' => 1]) }}" method="POST" onsubmit="updateCartFormAction(event, {{ $product->id }})">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input type="number" name="quantity" value="1" min="1" id="quantity-{{ $product->id }}" class="form-control">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-warning">🛒</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
function updateCartFormAction(event, productId) {
    event.preventDefault();
    var form = document.getElementById('cart-form-' + productId);
    var quantity = document.getElementById('quantity-' + productId).value;
    form.action = "{{ url('cart/add') }}/" + productId + "/" + quantity;
    form.submit();
}
</script>
@endsection
