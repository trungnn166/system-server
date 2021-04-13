<?php
namespace App\Service\Impl;

use App\Service\UserService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserServiceImpl implements UserService 
{
    public function getUserByToken(Request $request) 
    {
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }
}