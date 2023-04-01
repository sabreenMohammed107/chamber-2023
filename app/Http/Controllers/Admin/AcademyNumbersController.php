<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Academy_in_number;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
class AcademyNumbersController extends Controller
{
    protected $object;
    
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Academy_in_number $object)
    {
        $this->middleware('auth:admin');

        $this->object = $object;
        $this->viewName = 'Admin.academyNumbers.';
        $this->routeName = 'number.';
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
        $numbers=Academy_in_number::orderBy("created_at", "Desc")->get();
      
      
        return view($this->viewName.'index', compact('numbers'));
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
        
        $data=[
            'en_name'=>$request->input('en_name'),
            'ar_name'=>$request->input('ar_name'),
            'value'=>$request->input('value'),
             
            
             ];
		
       
      
       
        $this->object::create($data);

	
       
        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
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
        $number =Academy_in_number::where('id', '=', $id)->first();
       
      

        return view($this->viewName.'edit',compact('number'));
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
        $data=[
            'en_name'=>$request->input('en_name'),
            'ar_name'=>$request->input('ar_name'),
            'value'=>$request->input('value'),
             
            
             ];
		
        $this->object::findOrFail($id)->update($data);
       
        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
