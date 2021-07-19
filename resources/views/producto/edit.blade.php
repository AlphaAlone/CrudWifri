@extends('layouts.app')

@section('content')
<div class="container">

<br>
<form action="{{ url('/producto/'.$datosProducto->id )}}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('producto.form',['modo'=>'Editar']);
</form>
</div>
@endsection
