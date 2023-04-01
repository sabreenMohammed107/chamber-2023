<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class UserListController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Admin $object)
    {
        
        $this->middleware('auth:admin');
        $this->object = $object;
        $this->viewName = 'admin.users.';
        $this->routeName = 'usersList.';

        $this->message = 'The Data has been saved';
      
        
       
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=Admin::orderBy("created_at", "Desc")->get();
        return view($this->viewName.'index', compact('users'));
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
        //
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
        $user = Admin::find($id);
        $user->Password = uniqid();
        $user->save();

        return redirect()->back()->with('flash_success',"$user->name's password has been reset successfully! Password('$user->Password')");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=Admin::where('id', '=', $id)->first();
        // Delete File ..
       
            $user->delete();
            return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }


    public function StudentResetPassword(Request $request)
    {
        $id = $request->id;
        $user = Admin::find($id);
        $user->Password = uniqid();
        $user->save();

        return redirect()->back()->with('added',"$user->name's password has been reset successfully! Password('$user->Password')");
    }


    public function resetPassword($id){
        $user = Admin::find($id);
 

        return view('auth.editPassword',compact('user'));
   
    }


    public function editUserPassword(Request $request){
        $id = $request->id;
        $user = Admin::find($id);
        $user->Password =$request->password;
        $user->save();

        return redirect('/home')->with('flash_success',"$user->name's password has been reset successfully! ");  
    }
}
