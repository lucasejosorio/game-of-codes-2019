@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="section-header">
            <span class="inner--icon"><i class="fas fa-search"></i></span>
            <span class="inner--text">Buscar Corridas</span>
        </div>
        <div class="ride-list">
            @include('layouts._card-list')
        </div>
    </div>
@endsection
