<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
    public function profile(Request $request)
    {
        $data['page_header'] = 'Profile';
        $data['page_title'] = 'Profile';
        $data['detail'] = DB::table('users')->where('id', Auth::user()->id)->first();
        if ($request->isMethod('post')) {
            $user = DB::table('users')->where('id', Auth::user()->id)->first();

            $img_name = null;
            if ($request->hasFile('img')) {
                $img_name = time() . '.' . $request->img->getClientOriginalExtension();
                $request->img->move(public_path('user'), $img_name);

                $affected = DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->update([
                        'name' => $request->input('txt_name'),
                        'email' => $request->input('txt_email'),
                        'username' => $request->input('txt_username'),
                        'phonenumber' => $request->input('txt_phonenumber'),
                        'password' => Hash::make($request->input('txt_password')),
                        'filename' => $img_name,
                    ]);
            } else {
                $affected = DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->update([
                        'name' => $request->input('txt_name'),
                        'email' => $request->input('txt_email'),
                        'username' => $request->input('txt_username'),
                        'phonenumber' => $request->input('txt_phonenumber'),
                        'password' => Hash::make($request->input('txt_password')),
                    ]);
            }

            if (!$affected) {
                return redirect(url('/admin/profile'))->with('error', 'Not Updated');
            }

            return redirect(url('/admin/profile'))->with('success', 'Successfully Updated');
        }
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
        $data['user'] = User::where('type', '<>', '1')->get()->toArray();
        return view('admin.user.index', compact('data'));
    }
    public function edit($id)
    {
        $data['page_header'] = 'User';
        $data['page_title'] = 'Edit User';
        $data['detail'] = DB::table('users')->where('id', $id)->first();
        return view('admin.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        $img_name = null;
        if ($request->hasFile('img')) {
            $img_name = time() . '.' . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('user'), $img_name);

            $affected = DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $request->input('txt_name'),
                    'email' => $request->input('txt_email'),
                    'username' => $request->input('txt_username'),
                    'phonenumber' => $request->input('txt_phonenumber'),
                    'password' => Hash::make($request->input('txt_password')),
                    'filename' => $img_name,
                ]);
        } else {
            $affected = DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $request->input('txt_name'),
                    'email' => $request->input('txt_email'),
                    'username' => $request->input('txt_username'),
                    'phonenumber' => $request->input('txt_phonenumber'),
                    'password' => Hash::make($request->input('txt_password')),
                ]);
        }

        if (!$affected) {
            return redirect(url('/admin/user/edit/' . $id))->with('error', 'User Not Updated');
        }

        return redirect(url('/admin/user'))->with('success', 'User Successfully Updated');
    }
    public function history($id) {
        $data['page_header'] = 'History';
        $data['page_title'] = 'History';
        return view('admin.user.history', compact('data'));
    }


}
