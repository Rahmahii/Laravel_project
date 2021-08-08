<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = auth()->user()->Categories;
        return response()->json([
            'success' => true,
            'data' => $category
        ]);
    }
    //----------------------------------------------------  
    public function show($id)
    {
        return new categoryResource(auth()->user()->Categories()->find($id));
    }
    //----------------------------------------------------
    public function store(Request $request)
    {
        $request->validated();
        $category = new Category();
        $category->name = $request->name;

        if (auth()->user()->Categories()->save($category)) {
            return response()->json([
                'success' => true,
                'data' => $category->toArray()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'category not added'
            ], 500);
        }
    }
    //----------------------------------------------------
    public function update(Request $request, $id)
    {
        $category = auth()->user()->Categories()->find($id);
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'category not found'
            ], 400);
        }

        $updated = $category->fill($request->all())->save();
        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => $category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'category can not be updated'
            ], 500);
        }
    }
    //----------------------------------------------------
    public function destroy($id)
    {
        return auth()->user()->Categories()->find($id);
    }
}
