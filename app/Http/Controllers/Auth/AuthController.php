<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Repositories\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Auth;
use DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $userRepository;
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth, UserRepositoryInterface $userRepository)
    {
        $this->auth = $auth;
        $this->userRepository = $userRepository;
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function postRegister(RegisterRequest $request)
    {
        $input = $request->only(['name', 'email', 'password']);
        $this->userRepository->create($input);
        return redirect()->route('getLogin');
    }

    public function getRegister ()
    {
        return view('auth.register');
    }

    public function getLogin ()
    {
        return view('auth.login');
    }

    public function postLogin (LoginRequest $request) {
        $loginUser = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($this->auth->attempt($loginUser)) {
            return redirect()->route('home');
        }
        return redirect()->route('getLogin')->withMessage(trans('user/messages.user_not_found'));
    }
}