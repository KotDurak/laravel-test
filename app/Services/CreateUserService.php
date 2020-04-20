<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class CreateUserService
{
    public function create(\Illuminate\Http\Request $request)
    {
        $user = new User();
        $password = $request->post('password');
        $password = Hash::make($password);
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->password = $password;

        return $user->save();
    }
}