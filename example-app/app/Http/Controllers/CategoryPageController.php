<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }

    // public function store(Request $request)
    // {
    //     $category = Category::create([
    //         'name' => $request->name,
    //     ]);
    //     return response()->json($category);
    // }
}
