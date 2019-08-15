<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sucursal;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use JsValidator;

class SucursalController extends Controller
{

  protected $validationRules;
  protected $attributeNames;
  protected $errorMessages;

  public function __construct()
  {
      $this->validationRules =
      [
          'nombre'=>'required|alpha_num|max:100',
      ];
      $this->attributeNames =
      [
          'nombre'=>'Nombre de la sucursal',
      ];
      $this->errorMessages =
      [
          'required' => ' :attribute es requerido',
      ];
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $sucursales = Sucursal::get();
      return view('sucursales.index',compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $sucursal = new Sucursal();
      $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form');
      return view('sucursales.form',compact('sucursal', 'validator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd(Sucursal::create($request->all()));
      $this->setValidator($request)->validate();
      Sucursal::create($request->all());
      flash("Sucursal creada exitosamente")->success();
      return redirect('/sucursal');
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

    public function tiendas()
    {

      $sucursales = Sucursal::get();
      return view('sucursales.listado',compact('sucursales'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $sucursal=Sucursal::findOrFail($id);
      $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form');
      return view('sucursales.form', compact('sucursal', 'validator'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $sucursal = Sucursal::findOrFail($id);
      //$this->setValidator($request)->validate();
      $sucursal->update($request->all());
      flash("Sucursal modificada exitosamente")->success();
      return redirect()->route('sucursal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $sucursal = Sucursal::findOrFail($id);
          $sucursal->delete();
          flash("Sucursal  eliminada exitosamente")->success()->important();
          return redirect()->route('sucursal.index');

    }

    protected function setValidator(Request $request, $id=0){

        return Validator::make($request->all(), $this->validationRules)->setAttributeNames($this->attributeNames);

    }
}
