@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')

  <h1>Configurações</h1>

  <x-alert>
    Conteúdo
  </x-alert>

  @if ($idade > 18)
      maior
  @else
      76
  @endif

  <form method="POST">
    @csrf

    Nome<br/>
    <input type="text" name="nome" /><br/>

    Idade<br/>
    <input type="text" name="idade" /><br/>

    <input type="submit" value="Enviar" /><br/>
  </form>

  <a href="/config/info">Informações</a>

@endsection