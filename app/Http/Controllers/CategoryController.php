<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::select('title')->get();

        return view('category.show', [
            'title' => 'Основная страница',
            'categories' => $categories,
        ]);
    }
}
