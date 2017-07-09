<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'store', 'destroy'
        ]);
    }

    public function store($id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->id === $user->id) {
            return redirect('/');
        }

        if (!Auth::user()->isFollowing($id)) {
            Auth::user()->follow($id);
        }

        session()->flash('success', '操作成功');
        return redirect()->route('users.show', $id);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->id === $user->id) {
            return redirect('/');
        }

        if (Auth::user()->isFollowing($id)) {
            Auth::user()->unfollow($id);
        }

        session()->flash('success', '操作成功');
        return redirect()->route('users.show', $id);
    }
}
