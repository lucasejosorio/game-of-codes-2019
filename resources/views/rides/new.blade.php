@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('ride.store')}}">
            @csrf
            <h1>VAI COMO?????</h1>
            <select name="transport_id">
                @foreach($transports as $transport)
                    <option value="{{$transport->id}}">{{$transport->title}}</option>
                @endforeach
            </select>
            <h1>PONTO DE PARTIDA</h1>
            <select name="venue_start_id">
                @foreach($venues as $venue)
                    <option value="{{$venue->id}}">{{$venue->title}}</option>
                @endforeach
            </select>
            <h1>PONTO DE DESTINO</h1>
            <select name="venue_destination_id">
                @foreach($venues as $venue)
                    <option value="{{$venue->id}}">{{$venue->title}}</option>
                @endforeach
            </select>
            <h1>Data e Hora</h1>
            <input type="datetime-local" name="date">
            <input type="hidden" value="{{$user->id}}" name="user">
            <br>
            <input type="submit" value="Salvar">
        </form>

    </div>

@endsection