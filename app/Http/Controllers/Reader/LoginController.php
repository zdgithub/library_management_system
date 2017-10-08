<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/reader/dash';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest.reader', ['except' => 'logout']);
    }

    //重写登录视图页面
    public function showLoginForm()
    {
      return view('reader.login');
    }

    //自定义认证驱动,使用reader guard
    protected function guard()
    {
      return auth()->guard('reader');
    }

}
