<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers\Users
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @return User
     */
    public function getAuthenticatedUser(Request $request)
    {
        return new User(
            $request->user()
        );
    }
}
