@extends('layouts.app')
@section('content')
    <div class="homepage">
        <div class="content-center">
            <div class="bike mb-1">
                <img src="{{ asset('images/bike.gif') }}" width="50" class="img-fluid " alt="">
            </div>
            <h4 class="text-center text-primary ml-3 mr-3">Encontre pessoas que fazem o
                mesmo destino que você</h4>
            <div class="text-center mt-3 mb-3">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    Vamos começar
                </a>
            </div>
            <div class="ml-3 mr-3">
                <img src="{{ asset('images/line.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
@endsection
