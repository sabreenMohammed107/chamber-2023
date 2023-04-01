<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\Conference_type;
use App\Models\Country;
use App\Models\Conference_gallery;
use App\Models\Conference_file;
use App\Models\Related_conference;
use App\Models\Chamber_ads;
use App\Models\Ads_vedio;
use Carbon\Carbon;
class ConferenceController extends Controller
{
    public function index()
    {

        $conferences = Conference::where('active','=',1)->orderBy("conference_date", "Desc")->paginate(6);
        $types = Conference_type::all();
        $countries = Country::all();

        return view('Customer.conference.index', compact('conferences', 'types', 'countries'));
    }

    function fetch_conference(Request $request)
    {

        if ($request->ajax()) {


            $conference_type_id = $request->input('conference_type_id');
            $country_id = $request->input('country_id');
            $name = $request->input('name');
            $conf_date = $request->input('conf_date');

            $filtters = Conference::where('active', '=', 1);

         
            if (!empty($request->get("conference_type_id"))) {
                $filtters->where('conference_type_id', '=', $request->get("conference_type_id"));
            }
            if (!empty($request->get("country_id"))) {
                $filtters->where('country_id', '=', $request->get("country_id"));
            }
            if (!empty($request->get("name"))) {
                if (!preg_match('/[^A-Za-z0-9]/', $request->get("name"))) {
                    // string contains only english letters & digits
                    $filtters->where('en_title', 'like', '%' . $request->get("name") . '%');
                } else {
                    $filtters->where('ar_title', 'like', '%' . $request->get("name") . '%');
                }
            }

            if (!empty($request->get("conf_date"))) {
                $filtters->where('conference_date', '>=', $request->get("conf_date"));
            }

            $conferences = $filtters->orderBy("created_at", "Desc")->paginate(6);

            return view('Customer.conference.calIndex', compact('conferences'))->render();
        }
    }

    function searchForm(Request $request)
    {

       
            $conference_type_id = $request->input('conference_type_id');
            $country_id = $request->input('country_id');
            $name = $request->input('name');
            $conf_date = $request->input('conf_date');

            $filtters = Conference::where('active', '=', 1);

         
            if (!empty($request->get("conference_type_id"))) {
                $filtters->where('conference_type_id', '=', $request->get("conference_type_id"));
            }
            if (!empty($request->get("country_id"))) {
                $filtters->where('country_id', '=', $request->get("country_id"));
            }
            if (!empty($request->get("name"))) {
                if (!preg_match('/[^A-Za-z0-9]/', $request->get("name"))) {
                    // string contains only english letters & digits
                    $filtters->where('en_title', 'like', '%' . $request->get("name") . '%');
                } else {
                    $filtters->where('ar_title', 'like', '%' . $request->get("name") . '%');
                }
            }

            if (!empty($request->get("conf_date"))) {
               
               
                $filtters->whereDate('conference_date', '=',$request->get("conf_date"));
            }

            $conferences = $filtters->orderBy("created_at", "Desc")->paginate(6);
            
            return view('Customer.conference.calIndex', compact('conferences'))->render();
        }
    
        public function conferenceDetails($id){

            $conferenceObj=Conference::where("id",'=',$id)->first();
            $conferenceGallery=Conference_gallery::where("conference_id",'=',$id)->where("active",'=',1)->orderBy("order", "asc")->get();
            $newsFile=Conference_file::where("conference_id",'=',$id)->get();
            $relatedConference=Related_conference::where("conference_id",'=',$id)->paginate(3);
            $conferenceRandom=Conference::take(3)->inRandomOrder(rand(10,100))->get();
            $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
            $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
            return view('Customer.conference.conferenceDetails',compact('adsVedio','newsFile','ads','conferenceObj','conferenceGallery','relatedConference','conferenceRandom'));
        }
        function fetch_conferenceDetails(Request $request)
        {
         
    
         if($request->ajax())
         {
             $id=$request->get("id");
             $conferenceObj=Conference::where("id",'=',$id)->first();
             $conferenceGallery=Conference_gallery::where("conference_id",'=',$id)->where("active",'=',1)->orderBy("order", "asc")->get();
             $newsFile=Conference_file::where("conference_id",'=',$id)->get();
             $relatedConference=Related_conference::where("conference_id",'=',$id)->paginate(3);
             $conferenceRandom=Conference::take(3)->inRandomOrder(rand(10,100))->get();
             $ads=Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10,100))->get();
             $adsVedio=Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10,100))->get();
             return view('Customer.conference.conferenceDetailsList',compact('adsVedio','ads','newsFile','conferenceObj','conferenceGallery','relatedConference','conferenceRandom'))->render();
         }
        }
}
