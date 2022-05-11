Mostrar la lista de productos
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $productos)
        <tr>
            <td>{{$productos->id}}</td>
            <td>{{$productos->nombre}}</td>
            <td>{{$productos->marca}}</td>
            <td>{{$productos->precio}}</td>
            <td>{{$productos->cantidad}}</td>
            <td>
            <img src="{{asset('storage').'/'.$productos->imagen}}" alt="">    
            </td>
            <td>
            <a href="{{url('/producto/'.$productos->id.'/edit')}}"> Editar</a>
             |

            <form action="{{url('/producto/'.$productos->id)}}" method="post">
            @csrf
            {{method_field('DELETE')}}
            <button type="submit" onclick="return confirm('¿quieres borrar el producto')">Borrar</button>
            </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>