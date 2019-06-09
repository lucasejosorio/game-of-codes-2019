@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="text-center">Bem vindo de volta <b>{{ ucfirst(Auth::user()->name) }}</b> <i
                class="far fa-smile-wink fa-xl ml-1 text-primary"></i></p>

        <div class="section-header clearfix mb-2">
            <span class="inner--icon"><i class="fas fa-biking"></i></span>
            <span class="inner--text">Minhas Trips</span>
            <a class="btn btn-primary float-right" href="{{ route('ride.create') }}"><i class="fa fa-plus"></i>
                Adicionar</a>
        </div>
        <div class="ride-list">
            @forelse($rides as $ride)
                <div class="ride-list__item">
                    <div class="from">
                        <div class="title">
                            <span class="inner--text font-weight-bold">De: </span>
                            <span class="inner--name text-primary font-weight-bold">{{$ride->start_venue->title}}</span>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="to">
                        <span class="inner--text font-weight-bold">Até: </span>
                        <span
                            class="inner--name text-primary font-weight-bold">{{$ride->destination_venue->title}}</span>
                    </div>
                    <div class="to">
                        <span class="inner--text font-weight-bold">Horário: </span>
                        <span
                            class="inner--name text-primary font-weight-bold">{{$ride->date->format("h\h d/m/Y ")}}</span>
                    </div>
                    <div class="to">
                        <span class="inner--text font-weight-bold">Veículo: </span>
                        <span class="inner--name text-primary font-weight-bold">{{$ride->transport->title}}</span>
                    </div>
                    <a class="btn btn-block btn-primary" href="{{route('ride.show', $ride->id)}}">Ver detalhes</a>
                </div>
            @empty
                <div class="ride-list__item">
                    <div class="no-results">
                        <div class="inner--icon"><i class="far fa-dizzy"></i></div>
                        <div class="inner--text"></div>
                        Você ainda não participa de nenhuma trip!
                    </div>
                    @endforelse
                </div>
        </div>
    </div>

@endsection
