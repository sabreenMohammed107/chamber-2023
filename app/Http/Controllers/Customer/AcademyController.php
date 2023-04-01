<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chamber_article;
use App\Models\Article_gallery;
use App\Models\Academy_in_number;
use App\Models\Academy_gallery;
use App\Models\Academy_sponsor;
use App\Models\Academy_partener;
use App\Models\Academy_data;
use App\Models\Academy_course;
use App\Models\Course_applicant;
class AcademyController extends Controller
{
    public function index($id)
    {
        $view_page = 'Customer.academy.';
        //git first academy text & gallery
        $data = Chamber_article::findOrFail($id);
        $galleries = Article_gallery::where('article_id', '=', $id)->where('active', '=', 1)->orderBy("created_at", "Desc")->get();
        $chamberNumbers = Academy_in_number::all();
        $acdemyGalleries = Academy_gallery::where('active', '=', 1)->get();
        $sponsors = Academy_sponsor::where('active', '=', 1)->get();
        $parteners = Academy_partener::where('active', '=', 1)->get();


        $contactAcademy = Academy_data::first();
        if (!$contactAcademy) {
            $contactAcademy = new Academy_data();
        }
        return view($view_page . 'index', compact('data', 'galleries', 'chamberNumbers', 'acdemyGalleries', 'sponsors', 'parteners', 'contactAcademy'));
    }


    public function training($id)
    {
        $view_page = 'Customer.academy.';
        //git first academy text & gallery
        $data = Chamber_article::findOrFail($id);
        $galleries = Article_gallery::where('article_id', '=', $id)->where('active', '=', 1)->orderBy("created_at", "Desc")->get();
        $sponsors = Academy_sponsor::where('active', '=', 1)->get();
        $parteners = Academy_partener::where('active', '=', 1)->get();
        $contactAcademy = Academy_data::first();
        if (!$contactAcademy) {
            $contactAcademy = new Academy_data();
        }
        return view($view_page . 'training', compact('data', 'galleries', 'sponsors', 'parteners', 'contactAcademy'));
    }


    public function course()
    {

        $view_page = 'Customer.academy.';

        $sponsors = Academy_sponsor::where('active', '=', 1)->get();
        $parteners = Academy_partener::where('active', '=', 1)->get();
        $coursegalleries = Academy_course::where('active', '=', 1)->where('vip','>',0)->get();
        $courses = Academy_course::where('active', '=', 1)->get();
        $contactAcademy = Academy_data::first();
        if (!$contactAcademy) {
            $contactAcademy = new Academy_data();
        }
        return view($view_page . 'course', compact('sponsors', 'parteners', 'contactAcademy','courses','coursegalleries'));
    }

    public function courseDetails($id){

        $view_page = 'Customer.academy.';
        $sponsors = Academy_sponsor::where('active', '=', 1)->get();
        $parteners = Academy_partener::where('active', '=', 1)->get();
        $coursegalleries = Academy_course::where('active', '=', 1)->where('vip','>',0)->take(4)->get();
      $details= Academy_course::where('id', '=', $id)->first();
    
        $contactAcademy = Academy_data::first();
        if (!$contactAcademy) {
            $contactAcademy = new Academy_data();
        }
        return view($view_page . 'registration', compact('sponsors', 'parteners', 'contactAcademy','coursegalleries','details'));
    }

    function registerationForm(Request $request)
    {
        $data=[
            'name'=>$request->input('name'),
            'mobile'=>$request->input('mobile'),
            'email'=>$request->input('email'),
            'notes'=>$request->input('notes'),
            'course_id'=>$request->input('course_id'),
           
            
             ];
		
       
      
       
             Course_applicant::create($data);

	
        return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
    }
}
