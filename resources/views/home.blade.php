@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Message de LaraShop') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

{{ __('Bienvenue chez LaraShop, votre boutique en ligne dédiée aux sprays qui puent de la plus haute qualité. Que vous soyez un farceur professionnel, un amateur de blagues ou que vous souhaitiez simplement ajouter une touche humoristique à votre événement, LaraShop est là pour répondre à tous vos besoins.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
