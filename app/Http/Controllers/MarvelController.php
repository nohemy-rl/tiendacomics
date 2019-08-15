<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MarvelController extends Controller
{
   private $keyPublic;
   private $keyPrivate;
   const API_URL = 'http://gateway.marvel.com/v1/public/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
       $this->keyPublic = '14cfef4a2ed0248b39a2f9897cbe6dd8';
       $this->keyPrivate = '7a8440697044535a7cf8f78a38f391511e8cd87e';
   }
   /**
      * Do Request
      *
      * @param string $path The path in the URL
      * @param string $query The query in the URL
      *
      * @return array
      */
     public function doRequest($path, $query="")
     {
         //Get timestamp
         $ts = time();
         //Generate the has
         $hash = md5($ts . $this->keyPrivate . $this->keyPublic);
         //Manage affix and suffix in the query URL
         if(!empty($query)){
             $query = "?".$query."&";
         } else{
             $query = "?";
         }

         //Generate final URL
         $urlFinal = self::API_URL.$path.$query."apikey=".$this->keyPublic."&ts=".$ts."&hash=".$hash;
          //dd($urlFinal);
         //Define curl options
         $curlOptions = [
             CURLOPT_URL => $urlFinal,
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_FOLLOWLOCATION => false,
             CURLOPT_VERBOSE => false,
             CURLOPT_HEADER => false,
             CURLOPT_FORBID_REUSE => true,
         ];
         // Init curl.
         $curl = curl_init();
         // Set curl options.
         curl_setopt_array($curl, $curlOptions);
         // store results of curl execution.
         $result = curl_exec($curl);
         //Check the code HTTP of request to Marvel Comics API.
         $this -> checkCodeHTTTP(curl_getinfo($curl, CURLINFO_HTTP_CODE), $result);
         return json_decode($result, true);
     }
     /**
      * Verify the check code HTTP of request to Marvel Comics API.
      * If code is 200 then application continues run.
      * If code is different of 200 application trigger a Exception.
      *
      * @param int $HTTPCode The HTTP code value of request
      * @param array $result The result of request
      *
      * @return void if code is 200
      * @return App\Exceptions\MarvelErrorException if code is different of 200
      */
     public function checkCodeHTTTP($HTTPCode, $result=[]){
         $result = json_decode($result, true);
         switch ($HTTPCode) {
             case 200:
                 break;
             case 404:
                 throw new MarvelErrorException($result['status']);
                 break;
             case 409:
                 throw new MarvelErrorException($result['status']);
                 break;

             default:
                 throw new MarvelErrorException("Unexpected Error");
                 break;
         }
     }
}
