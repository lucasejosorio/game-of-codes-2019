@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('ride.create')}}"><h1>ADICIONAR NOVO</h1></a>
    <hr>
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
@endsection
