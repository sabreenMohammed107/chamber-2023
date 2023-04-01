<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department_meeting;
class ScheduleController extends Controller
{
    
    public function index(){

        $schedules=Department_meeting::orderBy("meeting_date", "Desc")->paginate(6);
       
        return view('Customer.schedule.index',compact('schedules'));
    }
    
    function fetch_categorySchedule(Request $request)
    {
     

     if($request->ajax())
     {
        $schedules=Department_meeting::orderBy("meeting_date", "Desc")->paginate(6);
      
        return view('Customer.schedule.indexSchedule',compact('schedules'))->render();
     }
    }
}
