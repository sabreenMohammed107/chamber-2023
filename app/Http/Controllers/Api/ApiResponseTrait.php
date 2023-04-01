<?php


namespace App\Http\Controllers\Api;

trait ApiResponseTrait{
    /**
     * constant in api data of api like this  should make this to make all work readable
     * [
     * 'data' =>
     * 'status' => true ,false
     * 'error' =>
     * ]
     * important know that sucees not only 200 , 201 => created , 202 =>Accepted
     */

     public  function apiResponse($data=null ,$error=null ,$code=200){
        
        
        $array=[
            'data'=> $data,
            'status'=>in_array($code , $this->successCode())?true : false,
            'error'=>$error
         ];
           
         return response($array,$code);
      

     }
/**
 * function return array of success code
 */

     public function successCode(){
return [
'200','201'
,'202'];
     }
}