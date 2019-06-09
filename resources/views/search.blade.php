@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="section-header">
            <span class="inner--icon"><i class="fas fa-search"></i></span>
            <span class="inner--text">Buscar Corridas</span>

            <div class="form-group">
                <div class="toggle-selector__container">
                    @foreach($transports as $transport)
                        <div class="toggle-selector__item">
                            <input type="radio" name="transport_id" id="transport_{{$transport->id}}"
                                   value="{{$transport->id}}" {{ $loop->first ? 'checked' : '' }}>
                            <label for="transport_{{$transport->id}}">
                                <span class="inner--icon"><i class="fas {{ $transport->icon }}"></i></span>
                                <span class="inner--text">{{$transport->title}}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('layouts._card-list')
    </div>
@endsection
