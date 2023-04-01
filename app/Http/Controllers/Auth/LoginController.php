<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use View;
use App\Models\Chamber_data;
use App\Models\Social;
use App\Models\Chamber_ads;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $branch =Chamber_data::first();
        $social =Social::first();
        $mainAds=Chamber_ads::first();
      if($social==null){
          $social = new Social();
      }
      if($branch==null){
          $branch = new Chamber_data();
      }

     
     
      if($mainAds==null){
          $mainAds = new Chamber_ads();
      }
       
      View::share(['social' => $social,'mainAds' => $mainAds, 'branch' => $branch]);
     
  
    }
    
}
