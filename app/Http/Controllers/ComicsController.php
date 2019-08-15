<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MarvelController;
use Illuminate\Support\Carbon;

class ComicsController extends Controller
{
  public function __construct(){
       $this -> MarvelController = new MarvelController();
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $comics = $this->MarvelController->doRequest('comics');
      return view('comics.index', ['comics' => $comics['data']['results']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $comics = $this->MarvelController->doRequest('comics/'.$id, '');
      //dd($comics);
      $personajes = $this->MarvelController->doRequest('comics/'.$id.'/characters', '');
      return view('comics.ficha', ['personajes' => $personajes['data']['results'],'comics' => $comics['data']['results']]);
    }

    public function tienda($limit)
    {
      $comics = $this->MarvelController->doRequest('comics','orderBy=title&limit='.$limit);
      return view('comics.tienda', ['comics' => $comics['data']['results']]);
    }

}
