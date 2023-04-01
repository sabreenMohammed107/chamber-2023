<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function __construct()
    {
     $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginAdminForm()
    {
        return view('Admin.login');
    }
   

    public function login(Request $request)
    {
       
        $this->validateLogin($request);
        
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // 
            return redirect()->intended(url('/admin'));
        }
       
      
        return redirect()->back()->withInput($request->only(['email', 'remember']));
    }

    protected function attemptLogin(Request $request)
    
    {
        $user = Admin::where('email', $request->email)
            ->where('password', $request->password)
            ->first();
    
        if(!isset($user)){
            return redirect()->back()->withInput($request->only(['email', 'remember']));
        }
    
        \Auth::guard('admin')->login($user);
    
        return redirect()->intended(url('/admin'));
    }
    public function logout(Request $request)
    {
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/admin/login');
    }

   

  
   
}
