Formulario de creacion de producto

<form method="post" action="{{url('/producto')}}" enctype="multipart/form-data">
@csrf
@include('producto.form')
    
</form>