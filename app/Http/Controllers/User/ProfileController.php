<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
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
}
