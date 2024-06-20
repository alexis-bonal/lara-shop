@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le produit</h1>
        <form action="{{ route('admin.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Prix :</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" step="0.01">
            </div>
            <div class="form-group">
                <label for="image">Image du produit :</label>
               <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
<img id="image-preview" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">

            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>

   <script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('image-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
