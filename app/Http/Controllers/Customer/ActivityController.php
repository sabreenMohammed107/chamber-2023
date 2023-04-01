<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Woman_activity;
use App\Models\Wactivity_gallery;
use App\Models\Wactivity_file;
use App\Models\Related_wactivity;
use App\Models\Chamber_ads;
use App\Models\Ads_vedio;
class ActivityController extends Controller
{
    public function index(){

        $news=Woman_activity::where('active','=',1)->orderBy("activity_date", "Desc")->paginate(6);
      $newsRandom=Woman_activity::take(3)->inRandomOrder(rand(10,100))->get();
      $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
      $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
          return view('Customer.activity.index',compact('adsVedio','ads','news','newsRandom'));
      }
  
      public function newsDetails($id){
  
          $newsObj=Woman_activity::where("id",'=',$id)->first();
          $newsGallery=Wactivity_gallery::where("activity_id",'=',$id)->where("active",'=',1)->orderBy("order", "asc")->get();
          $newsFile=Wactivity_file::where("activity_id",'=',$id)->get();
          $relatedNews=Related_wactivity::where("activity_id",'=',$id)->paginate(3);
          $newsRandom=Woman_activity::take(3)->inRandomOrder(rand(10,100))->get();
          $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
          $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
          return view('Customer.activity.newsDetails',compact('adsVedio','ads','newsObj','newsFile','newsGallery','relatedNews','newsRandom'));
      }
  
      function fetch_data(Request $request)
      {
       
  
       if($request->ajax())
       {
          $news=Woman_activity::orderBy("created_at", "Desc")->paginate(6);
          $newsRandom=Woman_activity::take(3)->inRandomOrder(rand(10,100))->get();
          $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
          $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
        return view('Customer.activity.indexNews', compact('adsVedio','ads','news','newsRandom'))->render();
       }
      }
  
      function fetch_news(Request $request)
      {
       
  
       if($request->ajax())
       {
           $id=$request->get("id");
           $newsObj=Woman_activity::where("id",'=',$id)->first();
           $newsGallery=Wactivity_gallery::where("activity_id",'=',$id)->where("active",'=',1)->orderBy("order", "asc")->get();
           $newsFile=Wactivity_file::where("activity_id",'=',$id)->get();
           $relatedNews=Related_wactivity::where("activity_id",'=',$id)->paginate(3);
           $newsRandom=Woman_activity::take(3)->inRandomOrder(rand(10,100))->get();
           $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
           $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
           return view('Customer.activity.newsDetailsList', compact('adsVedio','ads','newsObj','newsFile','newsGallery','relatedNews','newsRandom'))->render();
       }
      }
}
