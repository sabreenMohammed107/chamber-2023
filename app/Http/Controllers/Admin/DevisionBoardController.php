<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Department_board_director;
use App\Models\Department_board_member;

use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class DevisionBoardController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Department_board_director $object)
    {

        $this->middleware('auth:admin');
        $this->object = $object;
        $this->viewName = 'Admin.devBoard.';
        $this->routeName = 'devBoard.';
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

        $data = [

            'manager_en_name' => $request->input('manager_en_name'),
            'manager_ar_name' => $request->input('manager_ar_name'),
            'from_date' => Carbon::parse($request->input('from_date')),
            'to_date' => Carbon::parse($request->input('to_date')),

            'department_id' => $request->input('department_id'),

        ];
        if ($request->input('current')) {

            $data['current'] = $request->input('current');
        }

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
        $row = Department::where('id', '=', $id)->first();

        $boards = Department_board_director::where('department_id', '=', $id)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'boardDetails', compact('row', 'boards',));
    }

    public function editAdminMeeting($id)
    {
        $row = Department_board_director::where('id', '=', $id)->first();

        $rowId = $row->department_id;
        $devisionrow = Department::where('id', '=', $rowId)->first();
        $members = Department_board_member::where('board_directors_id', '=', $id)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'editBoard', compact('row', 'devisionrow', 'members'));
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
            'department_id' => $request->input('department_id'),

        ];
        if ($request->input('current')!=null) {

            $data['current'] =$request->input('current');
        }
      
        $this->object::findOrFail($id)->update($data);
        // return($request->input('current'));
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
        $row = Department_board_director::where('id', '=', $id)->first();
        $deptId = $row->department_id;
        try {

            $row->delete();
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'edit', $deptId);
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
            'position_order' => $request->input('person_position'),
            'board_directors_id' => $request->input('board_directors_id'),
            'ar_cv' => $request->input('ar_cv'),
            'en_cv' => $request->input('en_cv'),
        ];

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
        }

        Department_board_member::create($data);


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
            'position_order' => $request->input('person_position'),
            'board_directors_id' => $request->input('board_directors_id'),
            'ar_cv' => $request->input('ar_cv'),
            'en_cv' => $request->input('en_cv'),
        ];


        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
        }


        Department_board_member::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteBoardMember($id)
    {

        $member = Department_board_member::where('id', '=', $id)->first();
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
