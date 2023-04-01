<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Social_responsibility;

class SocialresController extends Controller
{
    public function index(){

      
     $socialres=Social_responsibility::where('active','=',1)->orderBy("created_at", "Desc")->paginate(4);
   
          return view('Customer.socialres.index',compact('socialres'));
      }

     
      function fetch_socialres(Request $request)
    {
        $socialres=Social_responsibility::where('active','=',1)->orderBy("created_at", "Desc")->paginate(4);
       
        return view('Customer.socialres.indexSocialres',compact('socialres'))->render();
     }


     
     public function socialresDetails($id){

        $socialresObj=Social_responsibility::where("id",'=',$id)->first();
       
        return view('Customer.socialres.socialresDetails',compact('socialresObj'));
    }
}
