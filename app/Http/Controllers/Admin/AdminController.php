<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $data['page_title'] = 'Dashboard';
        $data['total_item'] = DB::table('items')->count();
        $data['total_user'] = DB::table('users')->count();
        return view('admin.dashboard', compact('data'));
    }
    public function user()
    {
        $data['page_title'] = 'Users';
        $data['user'] = DB::table('users')->get();
        return view('admin.user.index', compact('data'));
    }
    public function edit()
    {
        $data['page_title'] = 'Edit User';
        return view('admin.user.edit', compact('data'));
    }
}
