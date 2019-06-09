@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Corrida</h2>
        <div class="ride-data">
            <div>
                <span>Partida: {{$ride->start_venue->title}}</span><br>
                <span>Chegada: {{$ride->destination_venue->title}}</span><br>
                <span>Dia e Hora: {{$ride->date->format("d-m-Y h\H")}}</span><br>
                <span>Transporte: {{$ride->transport->title}}</span><br>
            </div>
        </div>

        <hr>
        <h2>Users</h2>
        <div class="users-data">
            @foreach($users as $ride_user)
                <ul>
                    <li>{{$ride_user->name}} </li>
                </ul>
            @endforeach
        </div>
        <hr>

        <div class="comment-section">
            <h2>Comentários</h2>
            <ul>
            @forelse($ride->comments as $comment)
                <li class="comment">
                    <div class="profile-image">
                        <img src="{{$comment->user->image}}">
                    </div>
                    <div class="{{$comment->user_id == $user->id ? 'my-comment' : 'other-comment'}}">
                        {{$comment->comment}}
                    </div>
                </li>
            @empty
                <span>Ainda não tem comentários</span>
            @endforelse
            </ul>
            <br>
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

@push('css')
    <link href="{{ asset('css/ride/show.css') }}" rel="stylesheet">
@endpush
