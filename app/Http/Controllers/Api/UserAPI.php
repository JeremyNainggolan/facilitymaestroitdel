<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserAPI extends Controller
{
    public function index()
    {
        $user = User::all();

        if ($user->count() == 0) {
            return new UserResource(201, 'Facility Data Not Found', null);
        }

        return new UserResource(210, 'Facility Data', $user);
    }
}
