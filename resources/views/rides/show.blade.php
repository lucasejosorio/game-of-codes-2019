@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section-header clearfix mb-2">
            <span class="inner--icon"><i class="fas fa-biking"></i></span>
            <span class="inner--text">Detalhes da Trip</span>
        </div>
        <div class="ride-list__item">
            <div class="from">
                <div class="title">
                    <span class="inner--text font-weight-bold">De: </span>
                    <span class="inner--name text-primary font-weight-bold">{{$ride->start_venue->title}}</span>
                </div>
            </div>
            <div class="to">
                <span class="inner--text font-weight-bold">Até: </span>
                <span class="inner--name text-primary font-weight-bold">{{$ride->destination_venue->title}}</span>
            </div>
            <div class="to">
                <span class="inner--text font-weight-bold">Horário: </span>
                <span class="inner--name text-primary font-weight-bold">{{$ride->date->format("h\h d/m/Y ")}}</span>
            </div>
            <div class="to">
                <span class="inner--text font-weight-bold">Veículo: </span>
                <span class="inner--name text-primary font-weight-bold">{{$ride->transport->title}}</span>
            </div>
            <div class="to">
                <span class="inner--text font-weight-bold">Criador: </span>
                <span class="inner--name text-primary font-weight-bold">{{$ride->users->first()->name}}</span>
            </div>
        </div>

        <hr>
        <div class="section-header clearfix mb-2">
            <span class="inner--icon"><i class="fas fa-users"></i></span>
            <span class="inner--text">Membros da Trip</span>
        </div>
        <div class="users-data">
            @foreach($users as $ride_user)
                <ul class="user-trip-list">
                    <li>
                        <div class="avatar" style="background-position: center; background-size: cover; background-image: url('http://portalmelhoresamigos.com.br/wp-content/uploads/2016/11/gato-filhote.png');"></div> {{$ride_user->name}} </li>
                </ul>
            @endforeach
        </div>
        <hr>

        <div class="comment-section">
            <div class="section-header clearfix mb-2">
                <span class="inner--icon"><i class="fas fa-comments"></i></span>
                <span class="inner--text">Comentários</span>
            </div>
            <ul>
                @forelse($ride->comments as $comment)
                    <li class="comment {{$comment->user_id == $user->id ? 'my-comment' : 'other-comment'}}">
                        <div class="avatar" style="background-size: cover; background-position: center; background-image: url('http://portalmelhoresamigos.com.br/wp-content/uploads/2016/11/gato-filhote.png');">
                        </div>
                        <div class="chat">
                            <h6 class="font-weight-bold">{{ $comment->user->name }}</h6>
                            {{$comment->comment}}
                        </div>
                    </li>
                @empty
                    <span>Ainda não tem comentários</span>
                @endforelse
            </ul>
            <br>
            <div id="comment-alert" style="display: none" class="alert alert-success">Mensagem Enviada!</div>
            <div class="comment-text-box">
            <input type="text" id="comment-text">
            <button id="comment-sender"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>

    </div>

@endsection

@push('js')
    <script>
        var user = '{{$user->id}}';
        var ride_comment_url = '{{route('comment.store', $ride->id)}}'
        var my_avatar = '';
        var my_username = '{{ Auth::user()->name }}';
    </script>
@endpush

@push('css')
    <link href="{{ asset('css/ride/show.css') }}" rel="stylesheet">
@endpush
