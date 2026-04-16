<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    //
    function index() {
        $users=User::all();
        return userResource::collection($users);
    }

    function show($id) {
        $user=User::find($id);
        return new UserResource($user);
    }
}
