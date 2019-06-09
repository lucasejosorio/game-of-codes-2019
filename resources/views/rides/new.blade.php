@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('ride.store')}}">
            @csrf
            <div class="form-group">
                <div class="toggle-selector__container">
                    @foreach($transports as $transport)
                        <div class="toggle-selector__item">
                            <input type="radio" name="transport_id" id="transport_{{$transport->id}}"
                                   value="{{$transport->id}}" {{ $loop->first ? 'checked' : '' }}>
                            <label for="transport_{{$transport->id}}">
                                <span class="inner--icon"><i class="fas fa-biking"></i></span>
                                <span class="inner--text">{{$transport->title}}</span>

                            </label>
                        </div>
                    @endforeach

                </div>
            </div>
            <h1>VAI COMO?????</h1>

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
