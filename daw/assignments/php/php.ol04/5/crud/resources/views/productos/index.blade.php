@extends('base')

@section('main')
<div class='row'>
<div class='col-sm-12'>
  <h1 class='display-3'>Productos</h1>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
  <p><a href="{{ route('productos.create') }}" class="btn btn-primary">Añadir</a></p>
  <table class='table table-striped'>
    <thead>
      <tr>
        <td>ID</td>
        <td>Título</td>
        <td>Descripción</td>
        <td>Precio</td>
        <td>Editar</td>
        <td>Borrar</td>
      </tr>
    </thead>
    <tbody>
      @foreach($productos as $producto)
      <tr>
        <td>{{$producto->id}}</td>
        <td>{{$producto->titulo}}</td>
        <td>{{$producto->descripción}}</td>
        <td>{{$producto->precio}}</td>
        <td><a href="{{ route('productos.edit', $producto->id)}}" class='btn btn-primary'>Editar</a></td>
        <td>
          <form action="{{ route('productos.destroy', $producto->id)}}" method='post'>
            @csrf
            @method('DELETE')
            <button class='btn btn-danger' type='submit'>Borrar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
