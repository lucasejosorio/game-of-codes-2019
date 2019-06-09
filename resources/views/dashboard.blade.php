@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="text-center">Bem vindo de volta <b>{{ ucfirst(Auth::user()->name) }}</b> <i
                class="far fa-smile-wink fa-xl ml-1 text-primary"></i></p>
        <div class="ride-list__item mb-2">
            <button class="btn btn-block btn-primary" type="button" data-geolocation-request data-geolocation-action="listByDistance">
                <i class="fa fa-map-marker-alt"></i> Buscar trips mais próximas
            </button>
        </div>
        <form class="js-search-form" method="get" action="{{ route('search') }}" style="display: none">
            <input type="hidden" name="latitude" class="js-lat">
            <input type="hidden" name="longitude" class="js-lon">
        </form>
        <div class="section-header clearfix mb-2">
            <span class="inner--icon"><i class="fas fa-biking"></i></span>
            <span class="inner--text">Minhas Trips</span>
            <a class="btn btn-primary float-right" href="{{ route('ride.create') }}"><i class="fa fa-plus"></i>
                Adicionar</a>
        </div>
        @include('layouts._card-list')
    </div>

@endsection
