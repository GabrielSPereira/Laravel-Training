@extends('layouts.admin')

@section('title', 'Adição de Tarefas')

@section('content')
  <h1>Adição</h1>

  @if ($errors->any())
    <x-alert>
      @foreach($errors->all() as $error)
        {{ $error }} <br/>
      @endforeach
    </x-alert>
  @endif

  <form method="POST">
    @csrf

    <label>
      Título <br/>
      <input type="text" name="titulo">
    </label>

    <input type="submit" name="Adicionar">
  </form>
@endsection