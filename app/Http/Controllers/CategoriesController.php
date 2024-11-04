<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'description' => 'required|string'
            ]);

            $category = Category::create([
                'name' => $request['name'],
                'description' => $request['description']
            ]);

            return redirect()->route('admin')->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin')->with('error', 'Category could not be created: ' . $e->getMessage());
        }
    }
}
