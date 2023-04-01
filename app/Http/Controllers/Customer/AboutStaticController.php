<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutStaticController extends Controller
{
    public function aboutDirector(){
        return view('Customer.staticPages.aboutDirector');
    }

    public function history(){
        return view('Customer.staticPages.history');
    }


    public function messageVision(){

        return view('Customer.staticPages.messageVision');
        
    }
    public function onlinePayment(){
        return view('Customer.staticPages.onlinePayment');
        
    }
    public function qrCode(){
        return view('Customer.staticPages.qrCode');
        
    }
    public function blockchain(){
        return view('Customer.staticPages.blockchain');
        
    }
    public function chahbander(){
        return view('Customer.staticPages.chahbander');
        
    }
}
