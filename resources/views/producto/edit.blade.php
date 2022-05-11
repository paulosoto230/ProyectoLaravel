
<h3>Editar producto</h3>

<form action="{{url('/producto/'.$productoBuscado->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
<div>
@include('producto.form')
</div>

</form>

