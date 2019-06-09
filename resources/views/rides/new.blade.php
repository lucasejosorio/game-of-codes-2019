@extends('layouts.app')

@section('content')
    <div class="container">
        {{'user= '.json_encode($user)}}
    </div>

@endsection