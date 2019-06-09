@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('ride.store')}}">
            @csrf
            <div class="section-header mb-2">
                <span class="inner--text">Qual o seu meio de transporte?</span>
            </div>
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
            <div class="section-header mb-2">
                <span class="inner--text">Qual é o seu ponto de partida?</span>
            </div>
            <button type="button" class="btn btn-primary btn-block js-open-modal js-ponto-partida" data-target="#ponto_partida">
                selecionar ponto de partida
            </button>
            <div class="section-header mb-2 mt-4">
                <span class="inner--text">Qual é o seu destino?</span>
            </div>
            <button type="button" class="btn btn-primary btn-block js-open-modal js-ponto-chegada" data-target="#ponto_chegada">
                selecionar destino
            </button>
            @include('rides._start-points-list')
            @include('rides._end-points-list')
            @include('rides._map')
            <div class="section-header mb-2 mt-4">
                <span class="inner--text">Selecione a data e a hora</span>
            </div>
            <input type="datetime-local" name="date" class="form-control">
            <input type="hidden" value="{{$user->id}}" name="user">
            <br>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>
    </div>
@endsection
