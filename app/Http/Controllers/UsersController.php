<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UsersFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(UsersFormRequest $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        Auth::login($user);

        return to_route('series.index');
    }
}
