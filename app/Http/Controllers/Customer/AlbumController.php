<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\News;
use App\Models\Chamber_ads;
use App\Models\Ads_vedio;
class AlbumController extends Controller
{
    public function index(){
      
        $albums=Album::where('active', '=', 1)->orderBy("created_at", "Desc")->paginate(6);
        $newsRandom=News::take(3)->inRandomOrder(rand(10,100))->get();
        $ads=Chamber_ads::where('active', '=', 1)->get();
        $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
      return view('Customer.albums.index',compact('adsVedio','albums','newsRandom','ads'));
      }

      public function fetch_album(Request $request){
        if($request->ajax())
        {
            $albums=Album::where('active', '=', 1)->orderBy("created_at", "Desc")->paginate(6);
         
         return view('Customer.albums.indexAlbum',compact('albums'))->render();
        }   
      }
}
