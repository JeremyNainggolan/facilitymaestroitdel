<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register()
    {
        $data['page_title'] = 'Register';
        return view('register', compact('data'));
    }

    public function login()
    {
        $data['page_title'] = 'Login';
        if (auth()->check()) {
            return redirect('/home');
        }

        return view('login', compact('data'));
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'phonenumber' => 'required',
            'password' => 'required',
            'user_img' => '',
        ]);

        $filename = null;
        if ($request->hasfile('user_img')) {
            $filename = $request->user_img->getClientOriginalName();
            $request->filename->move(public_path('user'), $filename);
        }

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['username'] = $request->username;
        $data['phonenumber'] = $request->phonenumber;
        $data['password'] = Hash::make($request->password);
        $data['filename'] = $filename;


        $user = User::create($data);

        if (!$user) {
            return redirect(url('register'))->with('error', 'User already exist');
        }

        return redirect(url('login'))->with('success', 'Registration Successful');
    }

    function authentication(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(url('home'));
        }

        return redirect(url('login'))->with('error', 'Username or Password is Invalid');
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(url('login'));
    }
}
