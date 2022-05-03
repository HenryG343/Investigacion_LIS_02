<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::all();
        return view('index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos = new Productos();
        $productos->nombre = $request->nombre;
        $productos->cantidad = $request->cantidad;
        $productos->precio = $request->precio;
        $productos->descripcion = $request->descripcion;
        $productos->imagen = /*$request->imagen*/"...";

        $productos->save();

        $productos = Productos::all();
        return view('index')->with('productos',$productos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Productos::find($id);
        return view('edit')->with('productos',$productos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $productos = Productos::findOrFail($request->SKU);
        $productos->nombre = $request->nombre;
        $productos->cantidad = $request->cantidad;
        $productos->precio = $request->precio;
        $productos->descripcion = $request->descripcion;
        $productos->imagen = "...";

        $productos->save();
        $productos = Productos::all();
        return view('index')->with('productos',$productos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $productos = Productos::destroy($request->SKU);
        $productos = Productos::all();
        return view('index')->with('productos',$productos);
    }
    public function buscarNombre($nombre){
        return Productos::where("nombre","like","%".$nombre."%")->get();
    }
    public function buscarSKU($sku){
        return Productos::where("SKU","like",$sku)->get();
    }
}
