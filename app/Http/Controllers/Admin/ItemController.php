<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Item\StoreRequest;
use App\Http\Requests\Admin\Item\UpdateRequest;
use App\Models\Category;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(5);
        return view('admin.item.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::get(['id', 'title']);
        return view('admin.item.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Item::create($data);
        return redirect()->route('admin.item.index')->with('success', 'Item created successfully.');
    }

    public function show(Item $item)
    {
        return view('admin.item.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $categories = Category::get(['id', 'title']);
        return view('admin.item.edit', compact('item', 'categories'));
    }

    public function update(UpdateRequest $request, Item $item)
    {
        $data = $request->validated();
        $item->update($data);
        return redirect()->route('admin.item.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.item.index')->with('success', 'Item deleted successfully.');
    }
}
