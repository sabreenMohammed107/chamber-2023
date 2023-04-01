<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Announce_gallery;
use App\Models\Announce_file;
use App\Models\Related_announce;
use App\Models\Chamber_ads;
use App\Models\Ads_vedio;
class AnnounceController extends Controller
{
    public function index(){

        $announces=Announcement::where('active','=',1)->orderBy("announce_date", "Desc")->paginate(6);
      $announceRandom=Announcement::take(3)->inRandomOrder(rand(10,100))->get();
      $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
      $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
       return view('Customer.announce.index',compact('adsVedio','announces','ads','announceRandom'));
      }
  
      public function announceDetails($id){
       
          $announceObj=Announcement::where("id",'=',$id)->first();
          $announceGallery=Announce_gallery::where("announce_id",'=',$id)->where("active",'=',1)->orderBy("order", "asc")->get();
          $newsFile=Announce_file::where("announce_id",'=',$id)->get();
          $relatedAnnounces=Related_announce::where("announce_id",'=',$id)->paginate(3);
          $AnnounceRandom=Announcement::take(3)->inRandomOrder(rand(10,100))->get();
          $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
          $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
        return view('Customer.announce.announceDetails',compact('adsVedio','announceObj','newsFile','announceGallery','ads','relatedAnnounces','AnnounceRandom'));
      }
  
      function fetch_announce(Request $request)
      {
       
  
       if($request->ajax())
       {
          $announces=Announcement::orderBy("created_at", "Desc")->paginate(6);
          $announceRandom=Announcement::take(3)->inRandomOrder(rand(10,100))->get();
          $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
          $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
        return view('Customer.announce.indexAnnounce', compact('adsVedio','announces','announceRandom','ads'))->render();
       }
      }
  
      function fetch_announceDetails(Request $request)
      {
       
  
       if($request->ajax())
       {
           $id=$request->get("id");
           $announceObj=Announcement::where("id",'=',$id)->first();
           $announceGallery=Announce_gallery::where("announce_id",'=',$id)->where("active",'=',1)->orderBy("order", "asc")->get();
           $newsFile=Announce_file::where("announce_id",'=',$id)->get();
           $relatedAnnounces=Related_announce::where("announce_id",'=',$id)->paginate(3);
           $AnnounceRandom=Announcement::take(3)->inRandomOrder(rand(10,100))->get();
           $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
           $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
           return view('Customer.announce.announceDetailsList', compact('adsVedio','announceObj','newsFile','announceGallery','ads','relatedAnnounces','AnnounceRandom'))->render();
       }
      }
}
