<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\AuthRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Repositories\Sql\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function show_register()
    {
       return view('site.auth.register');
    }

    public function register(UserRequest $request) {
        $data = $request->except('password'  , 'email_verified_at' , 'remember_token');

        $data['password'] = bcrypt($request->password) ;
        $data['email_verified_at'] =  now() ;
        $data['remember_token'] = Str::random(10) ;


       $this->userRepo->create($data);

       return redirect(route('user.login'))->with('success', __('models.added_successfully'));

    }

    public function showLoginForm()
    {

        return view('site.auth.login');
    }

    public function login(AuthRequest $request)
    {

        //attempt to log admin
        if (auth()->attempt(['email' => $request->email, 'password' =>$request->password ])) {
            return \redirect()->intended(route('user.home'))->with('success', 'تم تسجيل الدخول بنجاح');
        }else{
            return redirect()->back()->with('error', 'البريد الالكترونى او كلمة المرور غير صحيحة');
        }



    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('user.login');
    }






}
