<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Editar Producto</h1>


    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
        @if($errors->has('nombre'))
            <div style="color: red;">{{ $errors->first('nombre') }}</div>
        @endif

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
        @if($errors->has('descripcion'))
            <div style="color: red;">{{ $errors->first('descripcion') }}</div>
        @endif

        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" value="{{ old('precio', $producto->precio) }}" required>
        @if($errors->has('precio'))
            <div style="color: red;">{{ $errors->first('precio') }}</div>
        @endif

        <label for="disponible">Disponible</label>
        <input type="checkbox" name="disponible" id="disponible" value="1" {{ old('disponible', $producto->disponible) ? 'checked' : '' }}>

        <label for="fecha_lanzamiento">Fecha de Creación</label>
        <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" value="{{ old('fecha_lanzamiento', $producto->fecha_lanzamiento) }}" required>
        @if($errors->has('fecha_lanzamiento'))
            <div style="color: red;">{{ $errors->first('fecha_lanzamiento') }}</div>
        @endif

        <label for="categoria_id">Categoría</label>
        <select name="categoria_id" id="categoria_id" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
        @if($errors->has('categoria_id'))
            <div style="color: red;">{{ $errors->first('categoria_id') }}</div>
        @endif

        <button type="submit">Actualizar Producto</button>
    </form>

    <a href="{{ route('productos.index') }}">Volver al listado</a>
</body>
</html>