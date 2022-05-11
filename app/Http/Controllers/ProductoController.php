<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['productos'] = producto::paginate(5);// con este metodo se llama a los resgistros y se hace una paginación de 5
        return view('producto.index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //estamos dando la informacion de la vista
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosEmpleado = request()-> all(); // este apartado me obtiene todos los datos enviados en el formulario
        $datosProducto = request()-> except('_token','Enviar'); // en este aparto se obtienen los datos pero se anula el token

      // esto hace el insert a la base de datos
        if($request->hasFile('imagen')){ // verifica si existe la fotografia
            $datosProducto['imagen']= $request->file('imagen')->store('uploads','public');// se altera ese campo y se inserta en la carpeta uploads
        }
        producto::insert($datosProducto);
        return response()->json($datosProducto); // en este apartado se convierten los datos en archivo json y se muestran
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // editamos el empleado una vez presionamos el boton
        $productoBuscado = producto::findOrFail($id); // buscamos el empleado a travez del id
        return view('producto.edit', compact('productoBuscado')); //le pasamos la información y se redirije a edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //CON ESTE METODO ACTUALIZAMOS EL PRODUCTO EN LA BASE DE DATOS
        $datosProducto = request()-> except(['_token','Enviar','_method']);
        producto::where('id', '=', $id) -> update($datosProducto);// igualamos la id con la id que viene del formulario y una vez que la encuentra actualiza

        $productoBuscado = producto::findOrFail($id); // buscamos el empleado a travez del id
        return view('producto.edit', compact('productoBuscado')); //le pasamos la información y se redirije a edit
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //borra el registro que se tiene en la base de datos por el id que se envio en el formulario

     //   producto::destroy($id);

       //  return redirect('producto');

       $producto = Producto::find($id)->delete();

       return redirect()->route('productos.index')
           ->with('success', 'Producto deleted successfully');



    }
}
