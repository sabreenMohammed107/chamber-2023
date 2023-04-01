<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Commerical_topic;
use App\Models\Commerical_topic_type;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class CommmercialTopicsController extends Controller
{
    protected $object;

    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Commerical_topic $object)
    {
        $this->middleware('auth:admin');

        $this->object = $object;
        $this->viewName = 'Admin.commmercial-topics.';
        $this->routeName = 'commmercial-topics.';
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
        $rows = Commerical_topic::orderBy("created_at", "Desc")->get();


        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Commerical_topic_type::all();
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
        $active = 0;


        if ($request->input('active') == 'on') {
            $active = 1;
        }
        $data = [

            'ar_text' => $request->input('ar_text'),
            'en_text' => $request->input('en_text'),
            'active' => $active,

        ];

        if ($request->hasFile('en_file')) {
            $en_file = $request->file('en_file');

            $data['en_file'] = $this->UplaodFile($en_file);
        }
        if ($request->hasFile('ar_file')) {
            $ar_file = $request->file('ar_file');

            $data['ar_file'] = $this->UplaodFile($ar_file);
        }

        if ($request->input('commerical_topic_id')) {

            $data['commerical_topic_id'] = $request->input('commerical_topic_id');
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
        $row = Commerical_topic::where('id', '=', $id)->first();

        $types = Commerical_topic_type::all();

        return view($this->viewName . 'edit', compact('row', 'types',));
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

            'ar_text' => $request->input('ar_text'),
            'en_text' => $request->input('en_text'),
            'active' => $active,

        ];

        if ($request->hasFile('en_file')) {
            $en_file = $request->file('en_file');

            $data['en_file'] = $this->UplaodFile($en_file);
        }
        if ($request->hasFile('ar_file')) {
            $ar_file = $request->file('ar_file');

            $data['ar_file'] = $this->UplaodFile($ar_file);
        }

        if ($request->input('commerical_topic_id')) {

            $data['commerical_topic_id'] = $request->input('commerical_topic_id');
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
        $row = Commerical_topic::where('id', '=', $id)->first();
        // Delete File ..
        $en_file = $row->en_file;
        $ar_file = $row->ar_file;

        $file_enname = public_path('uploads/encyclo/' . $en_file);
        $file_arname = public_path('uploads/encyclo/' . $ar_file);

        try {
            $row->delete();
            File::delete($file_enname);
            File::delete($file_enname);
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
