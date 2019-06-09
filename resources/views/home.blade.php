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
                <a href="{{route('ride.create')}}"><h1>ADICIONAR NOVO</h1></a>
                @forelse($rides as $ride)
                    <div>
                        <h3>Partida: {{$ride->start_venue->title}}</h3>
                        <h3>Chegada: {{$ride->destination_venue->title}}</h3>
                        <h3>Dia e Hora: {{$ride->date->format("d-m-Y h\H")}}</h3>
                        <h3>Transporte: {{$ride->transport->title}}</h3>
                    </div>

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