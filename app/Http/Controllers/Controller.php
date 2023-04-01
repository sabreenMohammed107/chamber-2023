<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
 
use View;
use App\Models\Chamber_data;
use App\Models\Social;
use App\Models\Chamber_ads;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct() {
       
         $branch =Chamber_data::first();
          $social =Social::first();
          $mainAds=Chamber_ads::where('id','=',100)->first();
        if($social==null){
            $social = new Social();
        }
        if($branch==null){
            $branch = new Chamber_data();
        }

       
       
        if($mainAds==null){
            $mainAds = new Chamber_ads();
        }
         
        View::share(['social' => $social,'mainAds' => $mainAds, 'branch' => $branch]);
       
    }
}
