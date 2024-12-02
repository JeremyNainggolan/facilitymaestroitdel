<?php

namespace App\Http\Controllers\Api\Hateoas;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hateoas\UserHateoasResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserHateoas extends Controller
{
    public function index()
    {
        $users = User::all();

        if ($users->count() == 0) {
            return new UserHateoasResource(201, 'User Data Not Found', null, $this->getHATEOASLinks());
        }

        return new UserHateoasResource(210, 'User Data', $users, $this->getHATEOASLinks());
    }

    // Helper function to generate HATEOAS links
    private function getHATEOASLinks()
    {
        $links = [
            'self' => url('api/users'),
            'create' => url('api/users/create'),
            'index' => url('api/users'),
            'show' => url('api/users/{id}'),
            'update' => url('api/users/{id}/update'),
            'destroy' => url('api/users/{id}/destroy'),
        ];

        return $links;
    }
}
