<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Events\NewUserEvent;

use App\Models\User;



class UsersController extends Controller
{
    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        NewUserEvent::dispatch($user->name, $user->email, $user->id);
        Auth::login($user);
        return redirect()->route('series.index');
    }
}
