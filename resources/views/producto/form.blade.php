<h1>{{ $modo }} Empleado</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>    
            @foreach($errors->all as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    

@endif

<div class="form-group" > 

<label for="Name">Nombre</label>
<input type="text" class="form-control" name = "Name" value="{{ isset($datosProducto->Name)?$datosProducto->Name:old('Name') }}" id = "Name">

</div>

<div class="form-group" > 

<label for="Description">Descripcion</label>
<input type="text" class="form-control" name = "Description" value="{{ isset($datosProducto->Description)?$datosProducto->Description:old('Description') }}" id = "Description">

</div>

<div class="form-group" > 

<label for="Pricing">Precio</label>
<input type="number" class="form-control" name = "Pricing" value="{{ isset($datosProducto->Pricing)?$datosProducto->Pricing:old('Pricing') }}"  id = "Pricing">

</div>


<input type="submit" class="btn btn-success" value = "{{ $modo }} Datos">
<a class="btn btn-primary" href="{{ url('producto/') }}">Regresar</a>