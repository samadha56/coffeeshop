<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;

class DashboardController extends Controller
{
    public function index()
    {
        $categoriesCount = Category::count();
        $itemsCount = Item::count();
        return view('admin.dashboard', compact('categoriesCount', 'itemsCount'));
    }
}
