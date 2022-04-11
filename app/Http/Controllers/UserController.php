<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerForm(Request $request)
    {
        if ($request->has('button')){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:3|confirmed'
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::login($user);

            return redirect()->route('homePage');
        }

        return view('user.registerForm', [
            'title' => 'Форма регистрации',
        ]);
    }

    public function loginForm(Request $request)
    {
        if ($request->has('button')){

            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'active' => 1,
            ])){
                return redirect()->route('homePage');
            } else {
                return redirect()->back();
            }
        }

        return view('user.loginForm', [
            'title' => 'Форма авторизации',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('homePage');
    }
}
