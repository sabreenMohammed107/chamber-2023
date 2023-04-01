<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home_slider;
use App\Models\News;
use App\Models\Announcement;
use App\Models\Conference;
use App\Models\Department_meeting;
use App\Models\Department_news;
use App\Models\Woman_activity;
use App\Models\Chamber_ads;
use App\Models\Ads_vedio;
use App\Models\Email_news_letter;
class IndexController extends Controller
{

    public function index()
    {
        $news=News::where('home_order', '!=',0)->where('active', '=',1)->orderBy("home_order", "asc")->take(6)->get();
        $announces=Announcement::where('home_order', '!=',0)->where('active', '=',1)->orderBy("home_order", "asc")->get();
        $conferences =Conference::where('home_order', '!=',0)->whereDate('conference_date', '=',now())->where('active', '=',1)->orderBy("home_order", "asc")->get();
        $sliders = Home_slider::where('active', '=', 1)->get();
        $ads=Chamber_ads::where('active', '=', 1)->get();
        $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
        return view('Customer.home.index', compact('adsVedio','sliders','news','announces','conferences','ads','adsVedio'));
    }

    public function search(Request $request)
    {
     $text = $request->get("q");
        if (!empty($request->get("q"))) {
            if (!preg_match('/[^A-Za-z0-9]/', $request->get("q"))) {
                // string contains only english letters & digits
                $news = News::where('en_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get();
                $announces = Announcement::where('en_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get();   //searchType=1
                $conferences = Conference::where('en_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get();   //searchType=2
                $department_news = Department_news::where('en_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get(); //searchType=3
                $department_meetings = Department_meeting::where('en_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get();  //searchType=4
                $activity=Woman_activity::where('en_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get();
                
            } else {
                $news = News::where('ar_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get();
                $announces = Announcement::where('ar_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get();   //searchType=1
                $conferences = Conference::where('ar_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get();   //searchType=2
                $department_news = Department_news::where('ar_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get(); //searchType=3
                $department_meetings = Department_meeting::where('ar_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get();  //searchType=4
                $activity=Woman_activity::where('ar_title', 'like', '%' . $request->get("q") . '%')->with('gallery')->get();
               
            }
        }
        $items = array_merge($activity->toArray(),$news->toArray(), $announces->toArray(), $conferences->toArray(), $department_news->toArray(), $department_meetings->toArray());
        $itemsCollection = collect($items)->unique();
        // dd($itemsCollection[0]['id']);

        //   dd($itemsCollection);
        return view('Customer.home.search', compact('itemsCollection'));
    }

    public function sendNewsLetter(Request $request){
       

       $letter= Email_news_letter::create($request->all());
      
        return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
   
    
}
}
