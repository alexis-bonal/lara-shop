@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenue chez Lara-Shop, votre boutique en ligne dédiée aux briques de construction de la plus haute qualité. Que vous soyez un professionnel de la construction, un bricoleur passionné ou que vous souhaitiez simplement apporter une touche unique à votre maison, Lara-Shop est là pour répondre à tous vos besoins') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
