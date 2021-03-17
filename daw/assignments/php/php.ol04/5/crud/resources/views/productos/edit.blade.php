@extends('base')

@section('main')
<div class='row'>
    <div class='col-sm-8 offset-sm-2'>
        <h1 class='display-3'>Editar</h1>

        @if ($errors->any())
        <div class='alert alert-danger'>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method='post' action="{{ route('productos.update', $producto->id) }}">
            @method('PATCH')
            @csrf
            <div class='form-group'>
                <label for='titulo'>Título:</label>
                <input type='text' class='form-control' name='titulo' value='{{ $producto->título }}' />
            </div>

            <div class='form-group'>
                <label for='descripción'>Descripción:</label>
                <input type='text' class='form-control' name='descripción' value='{{ $producto->descripción }}' />
            </div>

            <div class='form-group'>
                <label for='precio'>Precio:</label>
                <input type='number' class='form-control' name='precio' value='{{ $producto->precio }}' />
            </div>

            <button type='submit' class='btn btn-primary'>Actualizar</button>
        </form>
    </div>
</div>
@endsection
