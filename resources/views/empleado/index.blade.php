
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}
    
@endif

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }

        img{
            object-fit: cover;
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>

    <nav> <a href="{{url('empleado/create')}}">REGISTRARSE</a></nav>

    <h2>Lista de Usuarios</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($empleados as $empleado)

            <tr>
                <td>{{$empleado->id}}</td>
                <td><img src="{{asset('storage').'/'. $empleado->Foto}}" alt=""></td>
                <td>{{$empleado->Nombres}}</td>
                <td>{{$empleado->PrimerApel}}</td>
                <td>{{$empleado->SegundoApel}}</td> 
                <td>{{$empleado->Correo}}</td>
                <td> 
                
                    <a href="{{url('/empleado/'. $empleado->id . '/edit')}}">
                        EDITAR
                    </a>
                
                    <form action="{{url('/empleado/'.$empleado->id)}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="BORRAR">
                    </form>

                </td>
                
              

            </tr>
            @endforeach
            
           
        </tbody>
    </table>

</body>
</html>
