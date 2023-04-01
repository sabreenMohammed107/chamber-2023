<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use DB;
use Log;
use File;

use App\Models\Board_director;

use App\Models\Board_member;
class BoardController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Board_director $object)
    {

        $this->middleware('auth:admin');
        $this->object = $object;
        $this->viewName = 'Admin.board.';
        $this->routeName = 'board.';
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
        $rows = Board_director::orderBy("created_at", "Desc")->get();

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
       
        $data = [
           
            'manager_en_name' => $request->input('manager_en_name'),
            'manager_ar_name' => $request->input('manager_ar_name'),
            'from_date' => Carbon::parse($request->input('from_date')),
            'to_date' => Carbon::parse($request->input('to_date')),
           

        ];
        if($request->input('current')){

            $data['current']=$request->input('current');
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
        $row = Board_director::where('id', '=', $id)->first();
       
        $members = Board_member::where('board_directors_id', '=', $id)->orderBy("created_at", "Desc")->get();
      
        return view($this->viewName . 'edit', compact('row', 'members', ));
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
           
            'manager_en_name' => $request->input('manager_en_name'),
            'manager_ar_name' => $request->input('manager_ar_name'),
            'from_date' => Carbon::parse($request->input('from_date')),
            'to_date' => Carbon::parse($request->input('to_date')),
            

        ];
        if($request->input('current')){

            $data['current']=$request->input('current');
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
        $row = Board_director::where('id', '=', $id)->first();

        try {

            $row->delete();
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }


      /**
     * Announce Gallery
     */
    public function addBoardMember(Request $request)
    {

      
        $data = [

            'en_name' => $request->input('en_name'),
            'ar_name' => $request->input('ar_name'),
            'en_position' => $request->input('en_position'),
            'ar_position' => $request->input('ar_position'),
            'person_position' => $request->input('person_position'),
            'board_directors_id' => $request->input('board_directors_id'),
        ];

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
        }

        Board_member::create($data);


        return redirect()->back()->with('flash_success', $this->message);
    }

    public function updateBoardMember(Request $request)
    {
        $id = $request->input('member');

        $data = [

            'en_name' => $request->input('en_name'),
            'ar_name' => $request->input('ar_name'),
            'en_position' => $request->input('en_position'),
            'ar_position' => $request->input('ar_position'),
            'person_position' => $request->input('person_position'),
            'board_directors_id' => $request->input('board_directors_id'),
        ];

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
        }


        Board_member::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteBoardMember($id)
    {

        $member = Board_member::where('id', '=', $id)->first();
        $file = $member->image;


        $file_name = public_path('uploads/people/' . $file);

        try {

            $member->delete();
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
        $uploadPath = public_path('uploads/people');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
