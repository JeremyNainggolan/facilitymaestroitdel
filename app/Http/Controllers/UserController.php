<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function login()
    {
        if (auth()->check()) {
            // Redirect user based on their role
            return redirect('/');
        }

        return view('login');  // Render login page if not authenticated
    }

    public function home()
    {
        $data = User::all();
        return view('home', $data->toArray());
    }

    public function rent()
    {
        return view('rent');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'phonenumber' => 'required',
            'password' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['username'] = $request->username;
        $data['phonenumber'] = $request->phonenumber;
        $data['password'] = Hash::make($request->password);


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
