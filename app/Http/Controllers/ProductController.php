<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['productos']=product::paginate(5);
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $campos=[
            'Name'=>'required|string|max:100',
            'Description'=>'required|string|max:300',
            'Pricing'=>'required|integer'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);
        //$datosProducto = request()->all();
        $datosProducto = request()->except('_token');
        product::insert($datosProducto);
        //return response()->json($datosProducto);
        return redirect('producto')->with('mensaje','Producto agregado con exito'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$datosProducto = request()->except('_token');
        
        $datosProducto = product::findOrFail($id);
        return view('producto.edit', compact('datosProducto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Name'=>'required|string|max:100',
            'Description'=>'required|string|max:300',
            'Pricing'=>'required|integer'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosProducto = request()->except(['_token','_method']);
        product::where('id','=',$id)->update($datosProducto);
        $datosProducto = product::findOrFail($id);
        //return view('producto.edit', compact('datosProducto'));
        return redirect('producto')->with('mensaje','Producto modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        product::destroy($id);
        return redirect('producto')->with('mensaje','Producto borrado');
    }
}
