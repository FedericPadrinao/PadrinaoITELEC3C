<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
    }

    public function AddCategory(Request $request){
        
        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->user_id = Auth::id();

        $category->save();

        return redirect()->route('AllCat');
        }
}
