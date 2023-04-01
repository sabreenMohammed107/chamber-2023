<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use DB;
use Log;
use File;
use App\Models\Related_conference;
use App\Models\Conference_file;
use App\Models\Conference_gallery;
use App\Models\Conference;
use App\Models\Conference_type;
use App\Models\Country;
class ConferanceController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Conference $object)
    {

        $this->middleware('auth:admin');

        $this->object = $object;
        $this->viewName = 'Admin.conference.';
        $this->routeName = 'conference.';
        $this->message = 'The Data has been saved';
        $this->errormessage = 'check Your Data ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Conference::with('type')->orderBy("conference_date", "Desc")->get();


        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        $types=Conference_type::all();
        return view($this->viewName . 'create', compact('types','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $active = 0;

        if ($request->input('active') == 'on') {
            $active = 1;
        }
        $data = [

            'ar_title' => $request->input('ar_title'),
            'en_title' => $request->input('en_title'),
            'conference_date' => Carbon::parse($request->input('conference_date')),
            'ar_text' => $request->input('ar_text'),
            'conference_type_id' => $request->input('conference_type_id'),
            'en_text' => $request->input('en_text'),
            'searchType' => 2,
            'home_order' => $request->input('home_order'),
            'active' => $active,
        ];
        if($request->input('country_id')){

            $data['country_id']=$request->input('country_id');
         }

        $this->object::create($data);



        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types=Conference_type::all();
        $row = Conference::where('id', '=', $id)->first();
        $galleries = Conference_gallery::where('conference_id', '=', $id)->orderBy("created_at", "Desc")->get();
        $files = Conference_file::where('conference_id', '=', $id)->orderBy("created_at", "Desc")->get();
        $relateds = Conference::orderBy("created_at", "Desc")->get();
        $related = Related_conference::where('conference_id', '=', $id)->orderBy("created_at", "Desc")->get();
        $countries=Country::all();
        return view($this->viewName . 'edit', compact('row', 'galleries', 'files', 'relateds', 'related','types','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $active = 0;

        if ($request->input('active') == 'on') {
            $active = 1;
        }
        $data = [

            'ar_title' => $request->input('ar_title'),
            'en_title' => $request->input('en_title'),
            'conference_date' => Carbon::parse($request->input('conference_date')),
            'ar_text' => $request->input('ar_text'),
          
            'en_text' => $request->input('en_text'),
            'searchType' => 2,
            'home_order' => $request->input('home_order'),
            'active' => $active,
        ];
        if($request->input('conference_type_id')){

            $data['conference_type_id']=$request->input('conference_type_id');
         }
         if($request->input('country_id')){

            $data['country_id']=$request->input('country_id');
         }

         $this->object::findOrFail($id)->update($data);

         return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Conference::where('id', '=', $id)->first();

        try {

            $news->delete();
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
/**
     * Announce Gallery
     */
    public function addGallery(Request $request)
    {

        $active = 0;

        if ($request->input('active') == 'on') {
            $active = 1;
        }
        $data = [

            'vedio' => $request->input('vedio'),
            'order' => $request->input('order'),
            'conference_id' => $request->input('conference_id'),
            'home_order' => $request->input('home_order'),
            'active' => $active,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $data['image'] = $this->UplaodImage($image);
        }

        Conference_gallery::create($data);


        return redirect()->back()->with('flash_success', $this->message);
    }

    public function updateGallery(Request $request)
    {
        $id = $request->input('gallery_id');

        $active = 0;

        if ($request->input('active') == 'on') {
            $active = 1;
        }
        $data = [

            'vedio' => $request->input('vedio'),
            'order' => $request->input('order'),
            'conference_id' => $request->input('conference_id'),
            'home_order' => $request->input('home_order'),
            'active' => $active,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $data['image'] = $this->UplaodImage($image);
        }


        Conference_gallery::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteGallery($id)
    {

        $gallery = Conference_gallery::where('id', '=', $id)->first();
        $file = $gallery->image;


        $file_name = public_path('uploads/conference/' . $file);

        try {

            $gallery->delete();
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->back()->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
    /**
     * file
     */


    public function addFile(Request $request)
    {
        $lang = 1;

        if ($request->input('language_id') === 'en') {
            $lang = 0;
        }
        $data = [

            'name' => $request->input('name'),

            'conference_id' => $request->input('conference_id'),

            'language_id' => $lang,
        ];

        if ($request->hasFile('path')) {

            $path = $request->file('path');

            $data['path'] = $this->UplaodFile($path);
        }

        Conference_file::create($data);


        return redirect()->back()->with('flash_success', $this->message);
    }

    public function updateFile(Request $request)
    {
        $id = $request->input('file_id');

        $lang = 1;

        if ($request->input('language_id') === 'en') {
            $lang = 0;
        }
        $data = [

            'name' => $request->input('name'),

            'conference_id' => $request->input('conference_id'),

            'language_id' => $lang,
        ];

        if ($request->hasFile('path')) {

            $path = $request->file('path');

            $data['path'] = $this->UplaodFile($path);
        }

        Conference_file::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteFile($id)
    {

        $gallery = Conference_file::where('id', '=', $id)->first();
        $file = $gallery->path;


        $file_name = public_path('uploads/conference/' . $file);


        try {

            $gallery->delete();
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->back()->with('flash_success', 'Data Has Been Deleted Successfully !');
    }

    public function saveRelated(Request $request)
    {

        $data['conference_id'] = $request->get('conference_id');
        $data['related_conference_id'] = $request->get('related_conference_id');
        Related_conference::create($data);
        return back();
    }

    public function deleteRelated($id)
    {

        $relatednews= Related_conference::where('id', '=', $id)->first();
      
        try {

            $relatednews->delete();

        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

         return redirect()->back()->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
    /**
     * uplaud image
     */
    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();


        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/conferance');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
    /**
     * uplaud file
     */

    public function UplaodFile($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();


        // Rename The Image ..
        $imageName = $name;

        $uploadPath = public_path('uploads/conferance');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}

