@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="alert alert-secondary">
            assas
        </div>
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
