<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Service\Impl\UserServiceImpl as ImplUserServiceImpl;
use App\Service\UserServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; 
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $userService;

    public function __construct(ImplUserServiceImpl $userService)
    {   
        $this->userService = $userService;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['invalid_email_or_password'], Response::HTTP_UNAUTHORIZED);
            }
        } catch (JWTException $e) {
            return response()->json(['failed_to_create_token'], Response::HTTP_BAD_REQUEST);
        }
        
        return response()->json(compact('token'), Response::HTTP_OK);        
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserLogin() {
        return response()->json(auth()->user());
    }

     /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out'], Response::HTTP_OK);
    }

}
