

<label for="nombre">Nombre</label>
<input type="text" name="Nombre" value="{{$productoBuscado->nombre}}" id="nombre">
<br>

<label for="marca">Marca</label>
<input type="text" name="Marca" value="{{$productoBuscado->marca}}" id="marca">
<br>

<label for="precio">Precio</label>
<input type="text" name="Precio" value="{{$productoBuscado->precio}}" id="precio">
<br>

<label for="cantidad">Cantidad</label>
<input type="text" name="cantidad" value="{{$productoBuscado->cantidad}}" id="cantidad">
<br>
{{$productoBuscado->imagen}}

<label for="imagen">Imagen</label>
<input type="file" name="imagen" value="" id="imagen">
<br>
<button type="submit" name="Enviar" id="btnEnviar" value="guardarDatos"> Guardar</button>
