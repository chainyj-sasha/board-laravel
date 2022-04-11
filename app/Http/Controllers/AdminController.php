<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAll()
    {
        $ads = Ad::all();
        $users = User::all();

        return view('admin.showAll', [
            'title' => 'Страница администратора',
            'ads' => $ads,
            'users' => $users,
        ]);
    }

    public function showOneAd($id)
    {
        $ad = Ad::find($id);

        return view('admin.showOneAd', [
            'title' => 'Просмотр объявления',
            'ad' => $ad,
        ]);
    }

    public function changeAdActive(Request $request, $id)
    {
        $ad = Ad::find($id);

        $ad->active = $request->active;
        $ad->save();

        return redirect("/view-ad/$id");
    }

    public function showUser($id)
    {
        $user = User::find($id);

        return view('admin.showUser', [
            'title' => 'Просмотр юзера',
            'user' => $user,
        ]);
    }

    public function editUser(Request $request, $id)
    {
        if ($request->has('buttonEdite')){

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
            ]);

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }

        if ($request->has('buttonBan')){

            $user = User::find($id);
            $user->active = $request->ban;
            $user->save();
        }

        return redirect("/edit-user/$id");
    }
}
