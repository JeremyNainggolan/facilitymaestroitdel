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

    public function book(Request $request)
    {
        $data['page_title'] = 'Book | Facility Maestro';
        $data['facilities'] = Facility::all()->toArray();

        if ($request->isMethod('post')) {

            $request->validate([
                'facility' => 'required',
                'date_request' => 'required|date',
                'description' => 'required',
            ]);

            $affected = DB::table('rent')->insert([
                'facility_id' => $request->input('facility'),
                'user_id' => Auth::user()->id,
                'request_date' => $request->input('date_request'),

            ]);

            if ($affected) {
                return redirect('history/facility')->with('success', 'Request has been sent!');
            } else {
                return redirect('book')->with('error', 'Request has not been sent!');
            }
        }

        return view('book', compact('data'));
    }

    public function history()
    {
        $data['page_title'] = 'History | Facility Maestro';
        return view('history', compact('data'));
    }

    public function profile(Request $request)
    {
        $data['page_title'] = 'Profile | Facility Maestro';
        $data['detail'] = DB::table('users')->where('id', Auth::user()->id)->first();
        if ($request->isMethod('post')) {

            $affected = DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'name' => $request->input('txt_name'),
                    'email' => $request->input('txt_email'),
                    'username' => $request->input('txt_username'),
                    'phonenumber' => $request->input('txt_phonenumber'),
                    'password' => Hash::make($request->input('txt_password')),
                ]);

            if (!$affected) {
                return redirect(url('profile'))->with('error', 'Not Updated');
            }

            return redirect(url('profile'))->with('success', 'Successfully Updated');
        }

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
