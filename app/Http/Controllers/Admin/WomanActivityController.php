<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use DB;
use Log;
use File;
use App\Models\Related_wactivity;
use App\Models\Wactivity_file;
use App\Models\Wactivity_gallery;
use App\Models\Woman_activity;

class WomanActivityController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Woman_activity $object)
    {

        $this->middleware('auth:admin');

        $this->object = $object;
        $this->viewName = 'Admin.activity.';
        $this->routeName = 'activity.';
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
        $rows = Woman_activity::orderBy("activity_date", "Desc")->get();


        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewName . 'create');
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
            'activity_date' => Carbon::parse($request->input('activity_date')),
            'ar_text' => $request->input('ar_text'),
            'en_text' => $request->input('en_text'),
            'searchType' => 5,

            'active' => $active,
        ];


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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Woman_activity::where('id', '=', $id)->first();
        $galleries = Wactivity_gallery::where('activity_id', '=', $id)->orderBy("created_at", "Desc")->get();
        $files = Wactivity_file::where('activity_id', '=', $id)->orderBy("created_at", "Desc")->get();
        $relateds = Woman_activity::orderBy("created_at", "Desc")->get();
        $related = Related_wactivity::where('activity_id', '=', $id)->orderBy("created_at", "Desc")->get();
        return view($this->viewName . 'edit', compact('row', 'galleries', 'files', 'relateds', 'related'));
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
            'activity_date' => Carbon::parse($request->input('activity_date')),
            'ar_text' => $request->input('ar_text'),
            'en_text' => $request->input('en_text'),

            'active' => $active,
        ];
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
        $activity = Woman_activity::where('id', '=', $id)->first();

        try {

            $activity->delete();
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
            'activity_id' => $request->input('activity_id'),
            
            'active' => $active,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $data['image'] = $this->UplaodImage($image);
        }

        Wactivity_gallery::create($data);


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
            'activity_id' => $request->input('activity_id'),
            
            'active' => $active,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $data['image'] = $this->UplaodImage($image);
        }


        Wactivity_gallery::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteGallery($id)
    {

        $gallery = Wactivity_gallery::where('id', '=', $id)->first();
        $file = $gallery->image;


        $file_name = public_path('uploads/news/' . $file);

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

            'activity_id' => $request->input('activity_id'),

            'language_id' => $lang,
        ];

        if ($request->hasFile('path')) {

            $path = $request->file('path');

            $data['path'] = $this->UplaodFile($path);
        }

        Wactivity_file::create($data);


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

            'activity_id' => $request->input('activity_id'),

            'language_id' => $lang,
        ];

        if ($request->hasFile('path')) {

            $path = $request->file('path');

            $data['path'] = $this->UplaodFile($path);
        }

        Wactivity_file::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteFile($id)
    {

        $gallery = Wactivity_file::where('id', '=', $id)->first();
        $file = $gallery->path;


        $file_name = public_path('uploads/news/' . $file);


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

        $data['activity_id'] = $request->get('activity_id');
        $data['related_activity_id'] = $request->get('related_activity_id');
        Related_wactivity::create($data);
        return back();
    }

    public function deleteRelated($id)
    {

        $relatednews= Related_wactivity::where('id', '=', $id)->first();
      
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
        $uploadPath = public_path('uploads/news');

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

        $uploadPath = public_path('uploads/news');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
