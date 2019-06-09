@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="section-header">
            <span class="inner--icon"><i class="fas fa-search"></i></span>
            <span class="inner--text">Buscar Corridas</span>
        </div>
        <div class="ride-list__item mb-2">
            <button class="btn btn-block btn-primary" type="button" data-geolocation-request data-geolocation-action="listByDistance">
                <i class="fa fa-map-marker-alt"></i> Buscar trips mais próximas
            </button>
        </div>
        <form class="js-search-form" method="get" action="{{ route('dashboard') }}" style="display: none">
            <input type="hidden" name="latitude" class="js-lat">
            <input type="hidden" name="longitude" class="js-long">
        </form>
        @include('layouts._card-list')
    </div>
@endsection
