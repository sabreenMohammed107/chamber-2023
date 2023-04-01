<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact_messege;
class ContactController extends Controller
{
    public function index(){

      
          return view('Customer.contactus.index');
      }


      public function sendMessage(Request $request){

        Contact_messege::create($request->all());
       
       
          return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
     
  
      }
}
