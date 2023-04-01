<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Department_meeting;
use App\Models\Department_meeting_file;
use App\Models\Department_meeting_gallery;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
class DevisionMeetingController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Department_meeting $object)
    {

        $this->middleware('auth:admin');
        $this->object = $object;
        $this->viewName = 'Admin.devMeeting.';
        $this->routeName = 'devMeeting.';
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
       
        $rows = Department::orderBy("created_at", "Desc")->get();


        return view($this->viewName . 'index', compact('rows'));
    }


  
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'meeting_date' => Carbon::parse($request->input('meeting_date')),
            'ar_text' => $request->input('ar_text'),
            'en_text' => $request->input('en_text'),
            'searchType' => 4,
            'department_id' => $request->input('department_id'),
            'ar_schedule' => $request->input('ar_schedule'),
            'en_schedule' => $request->input('en_schedule'),
            'active' => $active,
        ];


        $this->object::create($data);

      


        return redirect()->route($this->routeName . 'edit', $request->input('department_id'));
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
        $row = Department::where('id', '=', $id)->first();
       
        $meetings = Department_meeting::where('department_id', '=', $id)->orderBy("meeting_date", "Desc")->get();
      
        return view($this->viewName . 'meetingDetails', compact('row', 'meetings', ));
    }

    public function editAdminMeeting($id)
    {
        $row = Department_meeting::where('id', '=', $id)->first();
       
        $rowId = $row->department_id;
        $devisionrow = Department::where('id', '=', $rowId)->first();
        $galleries = Department_meeting_gallery::where('department_meeting_id', '=',$id)->orderBy("created_at", "Desc")->get();
        $files = Department_meeting_file::where('department_meeting_id', '=',$id)->orderBy("created_at", "Desc")->get();
      
        return view($this->viewName . 'editMeeting', compact('row', 'devisionrow','galleries','files' ));
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
            'meeting_date' => Carbon::parse($request->input('meeting_date')),
            'ar_text' => $request->input('ar_text'),
            'en_text' => $request->input('en_text'),
            'department_id' => $request->input('department_id'),
            'active' => $active,
            'ar_schedule' => $request->input('ar_schedule'),
            'en_schedule' => $request->input('en_schedule'),
        ];
        $this->object::findOrFail($id)->update($data);

        return redirect()->route($this->routeName . 'edit', $request->input('department_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Department_meeting::where('id', '=', $id)->first();
        $deptId = $news->department_id;
        try {

            $news->delete();
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'edit', $deptId);
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
            'department_meeting_id' => $request->input('department_meeting_id'),
           
            'active' => $active,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $data['image'] = $this->UplaodImage($image);
        }

        Department_meeting_gallery::create($data);


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
            'department_meeting_id' => $request->input('department_meeting_id'),
           
            'active' => $active,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $data['image'] = $this->UplaodImage($image);
        }


        Department_meeting_gallery::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteGallery($id)
    {

        $gallery = Department_meeting_gallery::where('id', '=', $id)->first();
        $file = $gallery->image;


        $file_name = public_path('uploads/meeting/' . $file);

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

            'department_meeting_id' => $request->input('department_meeting_id'),

            'language_id' => $lang,
        ];

        if ($request->hasFile('path')) {

            $path = $request->file('path');

            $data['path'] = $this->UplaodFile($path);
        }

        Department_meeting_file::create($data);


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

            'department_meeting_id' => $request->input('department_meeting_id'),

            'language_id' => $lang,
        ];

        if ($request->hasFile('path')) {

            $path = $request->file('path');

            $data['path'] = $this->UplaodFile($path);
        }

        Department_meeting_file::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteFile($id)
    {

        $gallery = Department_meeting_file::where('id', '=', $id)->first();
        $file = $gallery->path;


        $file_name = public_path('uploads/meeting/' . $file);


        try {

            $gallery->delete();
            File::delete($file_name);
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
        $uploadPath = public_path('uploads/meeting');

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

        $uploadPath = public_path('uploads/meeting');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
