@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="text-center">Bem vindo de volta <b>{{ ucfirst(Auth::user()->name) }}</b> <i
                    class="far fa-smile-wink fa-lg text-warning"></i></p>

        <div class="section-header">
            <span class="inner--icon"><i class="fas fa-biking"></i></span>
            <span class="inner--text">Minhas Corridas</span>
        </div>
        <div class="ride-list">
            <div class="ride-list__item">
                <a href="{{route('ride.create')}}"><h3>ADICIONAR NOVO</h3></a>
                @forelse($rides as $ride)
                    <a href="{{route('ride.show', $ride->id)}}">
                        <div>
                            <span>Partida: {{$ride->start_venue->title}}</span><br>
                            <span>Chegada: {{$ride->destination_venue->title}}</span><br>
                            <span>Dia e Hora: {{$ride->date->format("d-m-Y h\H")}}</span><br>
                            <span>Transporte: {{$ride->transport->title}}</span><br>
                        </div>
                    </a>
                    <hr>
                @empty
                    <div>
                        <h1>TU TEM NADAAAAAAAAAAAAA</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection