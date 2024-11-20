<?php

namespace App\Http\Controllers;

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
        return view('register');
    }

    public function login()
    {
        if (auth()->check()) {
            // Redirect user based on their role
            return redirect('/home');
        }

        return view('login');  // Render login page if not authenticated
    }

    public function home()
    {
        $data['page_title'] = 'Home | Facility Maestro';
        $data['user'] = User::all()->toArray();
        return view('home', compact('data'));
    }

    public function rent()
    {
        $data['page_title'] = 'Rent | Facility Maestro';
        $data['items'] = Item::all()->toArray();
        $data['cart_items'] = [];
        return view('rent', compact('data'));
    }

    public function book()
    {
        $data['page_title'] = 'Book | Facility Maestro';
        $data['facilities'] = Facility::all()->toArray();
        return view('book', compact('data'));
    }

    public function history()
    {
        return view('history');
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
                return redirect(url('profile'))->with('error', 'Not Updated');
            }

            return redirect(url('profile'))->with('success', 'Successfully Updated');
        }
//        echo '<pre>';
//        print_r($data['detail']);
//        echo '<pre>';
//        exit();
        return view('profile', compact('data'));
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
