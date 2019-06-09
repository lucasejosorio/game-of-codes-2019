@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="section-header">
            <span class="inner--icon"><i class="fas fa-search"></i></span>
            <span class="inner--text">Buscar Corridas</span>
        </div>
        <div class="ride-list">
            <div class="ride-list__item">
                <a href="{{route('ride.create')}}"><h3>ADICIONAR NOVO</h3></a>
                @forelse($rides as $ride)

                    <a href="{{route('ride.show', ['id' => $ride->id])}}">
                        <div>
                            <span>Partida: {{$ride->start_venue->title}}</span><br>
                            <span>Chegada: {{$ride->destination_venue->title}}</span><br>
                            <span>Dia e Hora: {{$ride->date->format("d-m-Y h\H")}}</span><br>
                            <span>Transporte: {{$ride->transport->title}}</span><br>
                            <span>Distância: {{ $ride->distance }} </span>
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
