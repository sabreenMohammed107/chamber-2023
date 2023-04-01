<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brother_agreement;
use App\Models\Commerical_agreement;
use App\Models\Region;
use App\Models\Business_type;
use App\Models\Countries_data;
use App\Models\lows_type;
use App\Models\Decision_low;
use App\Models\Business_organization;
use App\Models\Embassies_type;
use App\Models\Embassies_consulate;
use App\Models\Communication_guide;
use App\Models\Exporter_encyclopedia;
use App\Models\Exporter_type;
use App\Models\Study_report;
use App\Models\Study_type;
use App\Models\Ministry;
use App\Models\Ministry_type;
use App\Models\Commerical_topic;
use App\Models\Commerical_topic_type;
class EncycloController extends Controller
{

    public function index()
    {
        $view_page = 'Customer.encyclo.';
        return view($view_page . 'index');
    }

    public function brother()
    {
        $view_page = 'Customer.encyclo.';

        $agreements = Brother_agreement::all();

        return view($view_page . 'brother', compact('agreements'));
    }


    public function commerical()
    {
        $view_page = 'Customer.encyclo.';

        $agreements = Commerical_agreement::all();

        return view($view_page . 'commerical', compact('agreements'));
    }


    public function region()
    {
        $view_page = 'Customer.encyclo.';

        $regions = Region::all();
        $agreements = Countries_data::all();
        return view($view_page . 'region', compact('regions','agreements'));
    }

    public function regionDetails(Request $request){
        $view_page = 'Customer.encyclo.';
        if($request->ajax())
     {
         $regionId=$request->get("region_id");
        $regions = Region::all();
        $agreements = Countries_data::where('region_id','=',$regionId)->get();
       if($regionId==null){
        $agreements = Countries_data::all();
       }
        return view($view_page . 'regionDetails', compact('regions','agreements'))->render();
     }
    
    }

    public function organization()
    {
        $view_page = 'Customer.encyclo.';

        $organization = Business_type::all();
        $agreements = Business_organization::all();
        return view($view_page . 'organization', compact('organization','agreements'));
    }

    public function organizationDetails(Request $request){
        $view_page = 'Customer.encyclo.';
        if($request->ajax())
     {
         $organizationId=$request->get("organization_id");
        $organization = Business_type::all();
        $agreements = Business_organization::where('bussiness_type_id','=',$organizationId)->get();
       if($organizationId==null){
        $agreements = Business_organization::all();
       }
        return view($view_page . 'organizationDetails', compact('organization','agreements'))->render();
     }
    
    }
   
    public function laws()
   
    {
        $view_page = 'Customer.encyclo.';

        $laws = lows_type::all();
        $agreements = Decision_low::all();
        return view($view_page . 'laws', compact('laws','agreements'));
    }

    public function lawsDetails(Request $request){
        $view_page = 'Customer.encyclo.';
        if($request->ajax())
     {
         $lawsId=$request->get("law_id");
        $laws = lows_type::all();
        $agreements = Decision_low::where('low_type_id','=',$lawsId)->get();
       if($lawsId==null){
        $agreements = Decision_low::all();
       }
        return view($view_page . 'lawsDetails', compact('laws','agreements'))->render();
     }
    
    }


    public function  embassy()
   
    {
        $view_page = 'Customer.encyclo.';

        $embassys = Embassies_type::all();
        $agreements = Embassies_consulate::all();
        return view($view_page . 'embassy', compact('embassys','agreements'));
    }

    public function  embassyDetails(Request $request){
        $view_page = 'Customer.encyclo.';
        if($request->ajax())
     {
         $embassyId=$request->get("embassy_id");
        $embassys = Embassies_type::all();
        $agreements = Embassies_consulate::where('embassies_type_id','=',$embassyId)->get();
       if($embassyId==null){
        $agreements = Embassies_consulate::all();
       }
        return view($view_page . 'embassyDetails', compact('embassys','agreements'))->render();
     }
    
    }

    public function communication()
    {
        $view_page = 'Customer.encyclo.';

        $agreements = Communication_guide::all();

        return view($view_page . 'communication', compact('agreements'));
    }

    public function  expencyclopedia()
   
    {
        $view_page = 'Customer.encyclo.';

        $exporter = Exporter_type::all();
        $agreements = Exporter_encyclopedia::all();
        return view($view_page . 'expencyclopedia', compact('exporter','agreements'));
    }

    public function  encyclopediaDetails(Request $request){
      
        $view_page = 'Customer.encyclo.';
        if($request->ajax())
     {
         $exporterId=$request->get("exporter_id");
        $exporter = Exporter_type::all();
        $agreements = Exporter_encyclopedia::where('exporter_type_id','=',$exporterId)->get();
       if($exporterId==null){
        $agreements = Exporter_encyclopedia::all();
       }
        return view($view_page . 'encyclopediaDetails', compact('exporter','agreements'))->render();
     }
    
    }

    public function  studies()
   
    {
        $view_page = 'Customer.encyclo.';

        $studies = Study_type::all();
        $agreements = Study_report::all();
        return view($view_page . 'studies', compact('studies','agreements'));
    }

    public function  studiesDetails(Request $request){
      
        $view_page = 'Customer.encyclo.';
        if($request->ajax())
     {
         $studyId=$request->get("study_id");
        $studies = Study_type::all();
        $agreements = Study_report::where('study_type_id','=',$studyId)->get();
       if($studyId==null){
        $agreements = Study_report::all();
       }
        return view($view_page . 'studiesDetails', compact('studies','agreements'))->render();
     }
    
    }
    

    public function  ministry()
   
    {
        $view_page = 'Customer.encyclo.';

        $ministries = Ministry_type::all();
        $agreements = Ministry::all();
        return view($view_page . 'ministry', compact('ministries','agreements'));
    }

    public function  ministryDetails(Request $request){
      
        $view_page = 'Customer.encyclo.';
        if($request->ajax())
     {
         $ministryId=$request->get("ministry_id");
        $ministries = Ministry_type::all();
        $agreements = Ministry::where('ministry_type_id','=',$ministryId)->get();
       if($ministryId==null){
        $agreements = Ministry::all();
       }
        return view($view_page . 'ministryDetails', compact('ministries','agreements'))->render();
     }
    
    }


    public function  topics()
   
    {
        $view_page = 'Customer.encyclo.';

        $topics = Commerical_topic_type::all();
        $agreements = Commerical_topic::all();
        return view($view_page . 'commerical-topic', compact('topics','agreements'));
    }

    public function  topicsDetails(Request $request){
      
        $view_page = 'Customer.encyclo.';
        if($request->ajax())
     {
         $topicId=$request->get("topic_id");
        $topics = Commerical_topic_type::all();
        $agreements = Commerical_topic::where('commerical_topic_id','=',$topicId)->get();
       if($topicId==null){
        $agreements = Commerical_topic::all();
       }
        return view($view_page . 'commerical-topicDetails', compact('topics','agreements'))->render();
     }
    
    }
}
