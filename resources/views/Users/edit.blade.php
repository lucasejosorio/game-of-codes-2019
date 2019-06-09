@extends('layouts.app')
@section('content')
<div class="container homepage"><br /><br />
<form action="{{ route('user.update', [$user->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text"  name="name" class="form-control" placeholder="digite o seu nome" value="{{$user->name}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Endereço de email</label>
        <input type="email" class="form-control" name="email" placeholder="Digite o seu e-mail" value="{{$user->email}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Telefone</label>
        <input type="text" class="form-control" name="phone" placeholder="Digite seu telefone" value="{{$user->phone}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Selecione um avatar</label>
        <input type="file" class="form-control-file" name="avatar">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>






<!-- 
    <input type="text"  name="name"  placeholder="digite o nome" value="{{$user->name}}"><br />
    <input type="email" name="email" placeholder="digite o e-mail" value="{{$user->email}}"><br />
    <input type="text"  name="phone" placeholder="digite o telefone" value="{{$user->phone}}"><br />
    <input type="file"  name="avatar"><br />
    <button type="submit">Enviar</button> -->
</form>

</div>
@endsection
