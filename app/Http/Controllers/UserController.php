<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = match ($request->sort)
        {
            'asc'=> User::orderBy('name', 'asc')->get(),
            'desc'=> User::orderBy('name', 'desc')->get(),
            default => User::all()
        };
        $msg = $request->session()->get('msg', '');
        return view('user.index', ['users'=>$users, 'msg'=>$msg]);
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('user_create')->with('success', 'User Created, enjoy!!!');
    }
    public function edit(User $user)
    {
        return view('user.edit', ['user'=>$user]);
    }
    public function update(Request $request, User $user)
    {
        $user->role=$request->role;
        $user->save();
        return redirect()->route('users_index');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users_index')->with('success', 'USER deleted');
    }
}
