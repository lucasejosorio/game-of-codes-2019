@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="text-center">Bem vindo de volta <b>{{ ucfirst(Auth::user()->name) }}</b> <i
                    class="far fa-smile-wink fa-xl ml-1 text-primary"></i></p>

        <div class="section-header clearfix mb-2">
            <span class="inner--icon"><i class="fas fa-biking"></i></span>
            <span class="inner--text">Minhas Corridas</span>
            <a class="btn btn-primary float-right" href="{{ route('ride.create') }}"><i class="fa fa-plus"></i> Adicionar</a>
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
