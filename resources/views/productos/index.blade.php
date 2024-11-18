<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Listado de Productos</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Disponible</th>
                <th>Fecha de Lanzamiento</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>${{ $producto->precio }}</td>
                    <td>{{ $producto->disponible ? 'Sí' : 'No' }}</td>
                    <td>{{ $producto->fecha_lanzamiento }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    
                    <td class="flex-td">
                        
                            <a href="{{ route('productos.edit', $producto->id) }}">
                                <button type="button" class="edit-button">Editar</button>
                            </a>
                        
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No hay productos disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('productos.create') }}"><button type="button">Crear nuevo producto</button></a>
</body>
</html>