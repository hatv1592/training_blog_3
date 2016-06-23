<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Validator;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    public function show($id)
    {
        return view('user.show');
    }
}