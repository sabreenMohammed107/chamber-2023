<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use DB;
use Log;
use File;
use App\Models\Country;
use App\Models\Chamber_chance;
class AdminChancesController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Chamber_chance $object)
    {

        $this->middleware('auth:admin');
        $this->object = $object;
        $this->viewName = 'Admin.adminChances.';
        $this->routeName = 'adminChance.';
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
        $rows = Chamber_chance::with('country')->orderBy("created_at", "Desc")->take(8)->get();

        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        return view($this->viewName . 'create', compact('countries'));
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
            'chance_type' => $request->input('chance_type'),
            'chance_date' => Carbon::parse($request->input('chance_date')),
            'ar_subject' => $request->input('ar_subject'),
            'en_subject' => $request->input('en_subject'),
            'ar_field' => $request->input('ar_field'),
            'en_field' => $request->input('en_field'),
            'ar_contact' => $request->input('ar_contact'),
            'en_contact' => $request->input('en_contact'),
            'active' =>$active,
            'chance_country_id' => $request->input('chance_country_id'),

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
        $row = Chamber_chance::where('id', '=', $id)->first();
        $countries=Country::all();
        return view($this->viewName . 'edit', compact('row','countries'));
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
           
            'chance_date' => Carbon::parse($request->input('chance_date')),
            'ar_subject' => $request->input('ar_subject'),
            'en_subject' => $request->input('en_subject'),
            'ar_field' => $request->input('ar_field'),
            'en_field' => $request->input('en_field'),
            'ar_contact' => $request->input('ar_contact'),
            'en_contact' => $request->input('en_contact'),
            'active' =>$active,
         

        ];

        if($request->input('chance_type')){

            $data['chance_type']=$request->input('chance_type');
         }
         if($request->input('chance_country_id')){

            $data['chance_country_id']=$request->input('chance_country_id');
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
        $row = Chamber_chance::where('id', '=', $id)->first();

        try {

            $row->delete();
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
}
