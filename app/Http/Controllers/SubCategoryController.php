<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function show($category)
    {
        $id = Category::where('title', $category)->select('id')->first();
        $subCategories = SubCategory::where('category_id', $id->id)->select('title')->get();


        return view('subCategory.show', [
            'title' => 'Подкатегории объявлений',
            'subCategories' => $subCategories,
        ]);
    }
}
