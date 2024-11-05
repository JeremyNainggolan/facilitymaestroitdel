<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login()
    {
        $data['page_title'] = "Admin Login";
        if (auth()->check()) {
            if (auth()->user()->type == 'admin') {
                return redirect(url('admin/dashboard'));
            }
        }

        return view('admin.auth.login', compact('data'));
    }
    function post_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->type == 'admin') {
                return redirect()->intended(url('admin/dashboard'));
            }
        }

        return redirect(url('admin/login'))->with('error', 'Username or Password is Invalid');
    }
    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(url('login'));
    }
    public function dashboard()
    {
        $data['page_header'] = 'Dashboard';
        $data['page_title'] = 'Dashboard';
        $data['total_item'] = DB::table('item')->count();
        $data['total_user'] = DB::table('users')->count();
        $data['total_facility'] = DB::table('facility')->count();
        $data['total_report'] = DB::table('report')->count();
        return view('admin.dashboard', compact('data'));
    }
    public function profile()
    {
        $data['page_header'] = 'Profile';
        $data['page_title'] = 'Profile';
        $data['detail'] = DB::table('users')->where('id', Auth::user()->id)->first();
//        echo '<pre>';
//        print_r($data['detail']);
//        echo '<pre>';
//        exit();
        return view('admin.auth.profile', compact('data'));
    }
    public function user()
    {
        $data['page_header'] = 'User';
        $data['page_title'] = 'Users';
        $data['user'] = User::all()->toArray();
        return view('admin.user.index', compact('data'));
    }
    public function edit()
    {
        $data['page_header'] = 'User';
        $data['page_title'] = 'Edit User';
        return view('admin.user.edit', compact('data'));
    }


}
