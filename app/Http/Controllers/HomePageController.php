<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomePageController extends Controller
{
    public function index()
    {
        $categories = Category::get(['slug', 'title']);
        return view('index', compact('categories'));
    }
}
