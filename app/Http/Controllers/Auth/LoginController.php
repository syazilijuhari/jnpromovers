<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo(){
        if(Auth::user()->role == 'admin'){
            return route('admin.dashboard');
        }else if(Auth::user()->role == 'customer'){
            return route('home');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(){

        $login = request()->input('login');

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        request()->merge([$field=>$login]);

        return $field;
    }

    protected function validateLogin(Request $request){

        $messages = [
            'login.required' => 'Email or username cannot be empty!',
            'password.required' => 'Password cannot be empty!',
        ];

        $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
            'email' => ['string', 'exists:users'],
            'name' => ['string', 'exists:users'],
        ], $messages);
    }
}
