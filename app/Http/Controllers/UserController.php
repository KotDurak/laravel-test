<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\CreateUserService;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const USER_ON_TABLE = 10;


    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(self::USER_ON_TABLE);

        return view('users.index', [
            'users' => $users
        ]);
    }


    public function create()
    {
        return view('users.create');
    }

    public function storage(UserRequest $request, CreateUserService $createUserService)
    {
        if ($request->validated() &&  $createUserService->create($request)) {
           return redirect('users');
        }
    }

    public function update($id)
    {
        $user = User::findOrFail($id);

        return view('users.update', [
            'user' => $user
        ]);
    }

    public function edit($id, Request $request)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
           'name' => 'required|max:255',
           'email'  => 'email'
        ]);
        $input = $request->all();
        $user->fill($input)->save();

        Session::flash('message', 'Сотрудник отредактирован');

        return redirect()->back();
    }
}
