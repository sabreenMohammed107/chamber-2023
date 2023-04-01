<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Academy_partener;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
class PartenerController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Academy_partener $object)
    {

        $this->middleware('auth:admin');
        $this->object = $object;
        $this->viewName = 'Admin.parteners.';
        $this->routeName = 'partener.';
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
        $parteners = Academy_partener::orderBy("created_at", "Desc")->get();


        return view($this->viewName . 'index', compact('parteners'));
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


        if ($request->input('partener') == 'on') {
            $active = 1;
        }
        $data = [
            'url' => $request->input('partener_website'),
            'en_name' => $request->input('en_name'),
            'ar_name' => $request->input('ar_name'),
            'active' => $active,

        ];

        if ($request->hasFile('pic')) {
            $client_logo_url = $request->file('pic');

            $data['logo'] = $this->UplaodImage($client_logo_url);
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
        $partener = Academy_partener::where('id', '=', $id)->first();



        return view($this->viewName . 'edit', compact('partener'));
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


        if ($request->input('partener') == 'on') {
            $active = 1;
        }
        $data = [
            'url' => $request->input('partener_website'),
            'en_name' => $request->input('en_name'),
            'ar_name' => $request->input('ar_name'),
            'active' => $active,

        ];

        if ($request->hasFile('pic')) {
            $client_logo_url = $request->file('pic');

            $data['logo'] = $this->UplaodImage($client_logo_url);
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
        $partener=Academy_partener::where('id', '=', $id)->first();
        // Delete File ..
        $file = $partener->logo;
      
        $file_name = public_path('uploads/academy/'.$file);
             
             try {
            $partener->delete();
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
		$uploadPath = public_path('uploads/academy');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
}
