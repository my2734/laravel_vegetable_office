<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\session;

class AdminLoginController extends Controller
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

    protected $redirectTo = '/admin/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request){
        
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:5'
        ],[
            'email.required'    => 'Vui lòng nhập email',
            'email.email'       => 'Email nhập sai định dạng',
            'password.required' => 'Vui lòng nhập password',
            'password.min'      => 'Mật khẩu ít nhất 6 ký tự'
        ]);

        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::guard('admin')->attempt($arr)) {
            $admin = Admin::where('email',$request->email)->first();
            $color_pattern_admin = Setting::where('setting_name','color_pattern_admin')->first();
            $profit_order = Setting::where('setting_name','profit_order')->first();
            $name_site = Setting::where('setting_name','name_site')->first();


            if(isset($color_pattern_admin)){
                $request->session()->put('setting.color_pattern_admin', $color_pattern_admin->setting_value);        
            }else{
                $request->session()->put('setting.color_pattern_admin', "#2a3f54");
            }

            if(isset($profit_order)){
                $request->session()->put('setting.profit_order', $profit_order->setting_value);        
            }else{
                $request->session()->put('setting.profit_order', '10');
            }

            if(isset($name_site)){
                $request->session()->put('setting.name_site', $name_site->setting_value);        
            }else{
                $request->session()->put('setting.name_site', '3SachFood');
            }

            $request->session()->put('admin.name',$admin->name);
            $request->session()->put('admin.id',$admin->id);
            $request->session()->put('admin.role',$admin->role);
            return redirect()->route('admin.index')->with('message_success','Bạn đã đăng nhập thành công');
        } else {
            
            return redirect()->back()->with('login_fail','Đăng nhập thất bại');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        // Auth::guard('admin')->logout();
        return redirect()->route('admin.get_login');
    }
}