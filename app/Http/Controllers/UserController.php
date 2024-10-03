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

    public function admin_login()
    {
        if (auth()->check()) {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.dashboard');
            }
        }

        return view('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function home()
    {
        return view('home');
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
        echo '<pre>';
        print_r($_POST);
        echo '<pre>';
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

    function admin_auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil dan user adalah admin
            if (auth()->user()->type == 'admin') {
                return redirect()->intended(url('admin/dashboard'));
            }
        }

        // Jika login gagal
        return redirect(url('admin/login'))->with('error', 'Username or Password is Invalid');
    }


    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(url('login'));
    }
}
