<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home_slider;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
class HomeSliderController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Home_slider $object)
    {

        $this->middleware('auth:admin');
        $this->object = $object;
        $this->viewName = 'Admin.homeSlider.';
        $this->routeName = 'slider.';
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
        $rows = Home_slider::orderBy("created_at", "Desc")->get();


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
            'master_ar_text' => $request->input('master_ar_text'),
            'master_en_text' => $request->input('master_en_text'),
            'url' => $request->input('url'),
            'order' => $request->input('order'),
            'sub_ar_text' => $request->input('sub_ar_text'),
            'sub_en_text' => $request->input('sub_en_text'),
            'active' => $active,

        ];

        if ($request->hasFile('pic')) {
            $client_logo_url = $request->file('pic');

            $data['image'] = $this->UplaodImage($client_logo_url);
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
        $slider = Home_slider::where('id', '=', $id)->first();



        return view($this->viewName . 'edit', compact('slider'));
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
            'master_ar_text' => $request->input('master_ar_text'),
            'master_en_text' => $request->input('master_en_text'),
            'url' => $request->input('url'),
            'order' => $request->input('order'),
            'sub_ar_text' => $request->input('sub_ar_text'),
            'sub_en_text' => $request->input('sub_en_text'),
            'active' => $active,

        ];

        if ($request->hasFile('pic')) {
            $client_logo_url = $request->file('pic');

            $data['image'] = $this->UplaodImage($client_logo_url);
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
        $slider=Home_slider::where('id', '=', $id)->first();
        // Delete File ..
        $file = $slider->image;
      
        $file_name = public_path('uploads/slider/'.$file);
             
             try {
            $slider->delete();
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }

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
		$imageName =$name;
		$uploadPath = public_path('uploads/slider');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
}
