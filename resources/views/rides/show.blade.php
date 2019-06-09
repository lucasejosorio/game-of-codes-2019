@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="text-center">Bem vindo de volta <b>{{ ucfirst(Auth::user()->name) }}</b> <i
                    class="far fa-smile-wink fa-lg text-warning"></i></p>

        <div class="section-header">
            <span class="inner--icon"><i class="fas fa-biking"></i></span>
            <span class="inner--text">Corrida</span>
        </div>

        <div class="ride-data">
            <div>
                <span>Partida: {{$ride->start_venue->title}}</span><br>
                <span>Chegada: {{$ride->destination_venue->title}}</span><br>
                <span>Dia e Hora: {{$ride->date->format("d-m-Y h\H")}}</span><br>
                <span>Transporte: {{$ride->transport->title}}</span><br>
            </div>
        </div>


        <div class="comment-section">
            <h2>Comentários</h2>
            @forelse($ride->comments as $comment)
                <span>{{$comment->comment}}</span><br>
            @empty
                <h1>TU TEM NADAAA</h1>
            @endforelse
            <br><br>
            <input type="text" id="comment-text">
            <button id="comment-sender">Enviar</button>
        </div>

    </div>

@endsection

@push('js')
    <script>
        var user = '{{$user->id}}';
        var ride_comment_url = '{{route('comment.store', $ride->id)}}'
    </script>
    <script src="{{ asset('js/ride/show.js') }}" defer></script>
@endpush