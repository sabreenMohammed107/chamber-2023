<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ministry;
use App\Models\Ministry_type;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
class MinistriesController extends Controller
{
    protected $object;

    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Ministry $object)
    {
        $this->middleware('auth:admin');

        $this->object = $object;
        $this->viewName = 'Admin.ministries.';
        $this->routeName = 'ministries.';
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
        $rows = Ministry::orderBy("created_at", "Desc")->get();


        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Ministry_type::all();
        return view($this->viewName . 'create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [

            'ar_name' => $request->input('ar_name'),
            'en_name' => $request->input('en_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'en_address' => $request->input('en_address'),
            'ar_address' => $request->input('ar_address'),
            'manager_ar_name' => $request->input('manager_ar_name'),
            'manager_en_name' => $request->input('manager_en_name'),
            'order' => $request->input('order'),

        ];
        if($request->input('ministry_type_id')){

            $data['ministry_type_id']=$request->input('ministry_type_id');
         }
         if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodFile($image);
          
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
        $row = Ministry::where('id', '=', $id)->first();
       
        $types=Ministry_type::all();
      
        return view($this->viewName . 'edit', compact('row', 'types', ));
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
        $data = [

            'ar_name' => $request->input('ar_name'),
            'en_name' => $request->input('en_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'en_address' => $request->input('en_address'),
            'ar_address' => $request->input('ar_address'),
            'manager_ar_name' => $request->input('manager_ar_name'),
            'manager_en_name' => $request->input('manager_en_name'),
            'order' => $request->input('order'),

        ];
        if($request->input('ministry_type_id')){

            $data['ministry_type_id']=$request->input('ministry_type_id');
         }
         if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodFile($image);
          
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
        
        $row=Ministry::where('id', '=', $id)->first();
        // Delete File ..
      
        $file = $row->image;
      
      
        $file_name = public_path('uploads/encyclo/'.$file);
             
             try {
            $row->delete();
        
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
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

        $uploadPath = public_path('uploads/encyclo');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
