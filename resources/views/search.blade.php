@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="section-header">
            <span class="inner--icon"><i class="fas fa-search"></i></span>
            <span class="inner--text">Buscar Corridas</span>

            <div class="form-group">
                <div class="toggle-selector__container">
                    @foreach($transports as $transport)
                        <div class="toggle-selector__item">
                            <input type="radio" name="transport_id" id="transport_{{$transport->id}}"
                                   value="{{$transport->id}}" {{ $loop->first ? 'checked' : '' }}>
                            <label for="transport_{{$transport->id}}">
                                <span class="inner--icon"><i class="fas {{ $transport->icon }}"></i></span>
                                <span class="inner--text">{{$transport->title}}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
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
