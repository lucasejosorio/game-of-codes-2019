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
                a
            </div>
        </div>
    </div>
@endsection
