<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function showAll($subcategory)
    {
        $id = SubCategory::where('title', $subcategory)->select('id')->first();

        $ads = Ad::where([
            ['subcategory_id', '=', $id->id],
            ['active', '=', '1'],
        ])->select('text')->get();

        return view('ad.showAll', [
            'title' => 'Объявления',
            'ads' => $ads,
            'subcategory' => $subcategory,
        ]);
    }

    public function insert(Request $request, $subcategory)
    {
        if (Auth::check()){
            $this->validate($request, [
                'text' => 'required|',
            ]);

            $id = SubCategory::where('title', $subcategory)->select('id')->first();

            $ad = new Ad();
            $ad->text = $request->text;
            $ad->subcategory_id = $id->id;
            $ad->user_id = auth()->user()->id;
            $ad->save();

            return redirect('/subcategory/' . $subcategory);
        }
        return redirect()->route('login');
    }
}
