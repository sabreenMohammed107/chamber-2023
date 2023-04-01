<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use App\Models\Social_responsibility;
class SocialResponsibilityController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Social_responsibility $object)
    {

        $this->middleware('auth:admin');
        $this->object = $object;
        $this->viewName = 'Admin.socialResponsibility.';
        $this->routeName = 'socialResponsibility.';
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
        $rows = Social_responsibility::orderBy("created_at", "Desc")->get();

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
           
            'en_title' => $request->input('en_title'),
            'ar_title' => $request->input('ar_title'),
            'en_text' => $request->input('en_text'),
            'ar_text' => $request->input('ar_text'),
            'active' =>$active,

        ];

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
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
        $row = Social_responsibility::where('id', '=', $id)->first();
       
      
      
        return view($this->viewName . 'edit', compact('row',  ));
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
           
            'en_title' => $request->input('en_title'),
            'ar_title' => $request->input('ar_title'),
            'en_text' => $request->input('en_text'),
            'ar_text' => $request->input('ar_text'),
            'active' =>$active,

        ];

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
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
        $row=Social_responsibility::where('id', '=', $id)->first();
        // Delete File ..
        $file = $row->image;
      
        $file_name = public_path('uploads/socialty/'.$file);
             
             try {
            $row->delete();
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
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
        $uploadPath = public_path('uploads/socialty');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
