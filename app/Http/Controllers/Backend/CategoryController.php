<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //

    public function all() {
        $categories = Category::latest()->get();
        return view('backend.category.all_categories', compact('categories'));
    }

    public function store(Request $request) {

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Created!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }


    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('backend.category.edit_category', compact('category'));
    }

    public function update(Request $request) {

        $category = Category::findOrFail($request->id);

        $category->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Edited!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    }
    
    public function delete($id) {
        
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
