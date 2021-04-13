<?php
namespace App\Service;
use Illuminate\Http\Request;

interface UserService 
{
    public function getUserByToken(Request $request);
}