@extends('layouts.app')
@section('content')
<div class="container homepage"><br /><br />
<form action="{{ route('user.update', [$user->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text"  name="name"  placeholder="digite o nome" value="{{$user->name}}"><br />
    <input type="email" name="email" placeholder="digite o e-mail" value="{{$user->email}}"><br />
    <input type="text"  name="phone" placeholder="digite o telefone" value="{{$user->phone}}"><br />
    <input type="file"  name="avatar"><br />
    <button type="submit">Enviar</button>
</form>

</div>
@endsection
