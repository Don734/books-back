<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\User;
// use App\Http\Requests\Admin\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $auth_user = auth()->user();
        return view('admin.pages.profile', ['user' => $auth_user]);
    }

    public function update(ProfileRequest $request)
    {
        $user_id = auth()->id();
        $user = User::find($user_id);

        $user->edit($request->all(), $request->user('web'));
        return redirect()->route('profile');
    }
}
