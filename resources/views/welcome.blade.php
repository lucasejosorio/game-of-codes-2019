@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="alert alert-secondary">
            assas
        </div>
        <div class="section-header">
            <span class="inner--icon"><i class="fas fa-search"></i></span>
            <span class="inner--text">Buscar Corridas</span>
        </div>
        <div class="ride-list__item">
            <div class="no-results">
                <div class="inner--icon"><i class="far fa-map"></i></div>
                <div class="inner--text"></div>
                Para encontrar as trips mais próximas, habilite a busca por localização
            </div>
        </div>
            @include('layouts._card-list')
    </div>
@endsection
