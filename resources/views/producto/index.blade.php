@extends('layouts.app')

@section('content')
<div class="container">


<div class="alert alert-success" role="alert">
    @if(Session::has('mensaje'))
        {{ Session::get('mensaje') }}
    @endif
</div>

<a href="{{ url('producto/create') }}" class="btn btn-success">Registrar Productos</a><br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $produc)
        <tr>
            <td>{{ $produc->id }}</td>
            <td>{{ $produc->Name }}</td>
            <td>{{ $produc->Description }}</td>
            <td>{{ $produc->Pricing }}</td>
            <td>
                <a href="{{ url('/producto/'.$produc->id.'/edit') }}" class="btn btn-warning">Editar</a>
                  |   
                <form action="{{ url('/producto/'.$produc->id ) }}" method="post" class="d-inline">
                @csrf
                {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('Estas Seguro?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection