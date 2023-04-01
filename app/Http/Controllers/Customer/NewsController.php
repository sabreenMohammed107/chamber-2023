<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\News_gallery;
use App\Models\News_file;
use App\Models\Related_new;
use App\Models\Chamber_ads;
use App\Models\Ads_vedio;
class NewsController extends Controller
{

    public function index(){

      $news=News::where('active','=',1)->orderBy("news_date", "Desc")->paginate(6);
    $newsRandom=News::take(3)->inRandomOrder(rand(10,100))->get();
    $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
    $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
        return view('Customer.news.index',compact('news','newsRandom','ads','adsVedio'));
    }

    public function newsDetails($id){

        $newsObj=News::where("id",'=',$id)->first();
        $newsGallery=News_gallery::where("news_id",'=',$id)->where("active",'=',1)->orderBy("order", "asc")->get();
        $newsFile=News_file::where("news_id",'=',$id)->get();
        $relatedNews=Related_new::where("news_id",'=',$id)->paginate(3);
        $newsRandom=News::take(3)->inRandomOrder(rand(10,100))->get();
        $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
        $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
      
        return view('Customer.news.newsDetails',compact('newsObj','newsGallery','newsFile','ads','relatedNews','newsRandom','adsVedio'));
    }

    function fetch_data(Request $request)
    {
     

     if($request->ajax())
     {
        $news=News::orderBy("created_at", "Desc")->paginate(6);
        $newsRandom=News::take(3)->inRandomOrder(rand(10,100))->get();
        $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
        $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
      return view('Customer.news.indexNews', compact('news','ads','adsVedio','newsRandom'))->render();
     }
    }

    function fetch_news(Request $request)
    {
     

     if($request->ajax())
     {
         $id=$request->get("id");
         $newsObj=News::where("id",'=',$id)->first();
         $newsGallery=News_gallery::where("news_id",'=',$id)->where("active",'=',1)->orderBy("order", "asc")->get();
         $newsFile=News_file::where("news_id",'=',$id)->get();
         $relatedNews=Related_new::where("news_id",'=',$id)->paginate(3);
         $newsRandom=News::take(3)->inRandomOrder(rand(10,100))->get();
         $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
         $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
         return view('Customer.news.newsDetailsList', compact('newsObj','newsGallery','relatedNews','newsFile','adsVedio','ads','newsRandom'))->render();
     }
    }
}
