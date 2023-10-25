<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
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


        // echo json_encode($arr);
        // die();

        if (Auth::guard('admin')->attempt($arr)) {
           
            $admin = Admin::where('email',$request->email)->first();
            // $request->session()->put('login.name',$user->name);
            // $request->session()->put('login.id',$user->id);
            // if(isset($user->avatar)){
            //     $request->session()->put('login.avatar',$user->avatar);
            // }
            // echo "dang nhap thanh cong";
            // die();
            $request->session()->put('admin.name',$admin->name);
            $request->session()->put('admin.id',$admin->id);
            
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