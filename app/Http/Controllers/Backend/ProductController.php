<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function all() {
        
        $products = Product::latest()->get();
        return view('backend.product.all_products', compact('products'));
    }
    
    public function add() {
        $suppliers = Supplier::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.add_products', compact('suppliers','categories'));
    }
    
    public function store(Request $request) {
       
        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();

        Image::make($image)->resize(300,300)->save('upload/products/'.$name_gen);
        $save_url = 'upload/products/'.$name_gen;


        Product::insert([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'product_code' => $request->product_code,
            'product_garage' => $request->product_garage,
            'product_image' => $save_url,
            'product_store' => $request->product_store,
            'buying_date' => $request->buying_date,
            'expire_date' => $request->expire_date,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Created!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.product')->with($notification);
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        $suppliers = Supplier::latest()->get();
        $categories = Category::latest()->get();

        return view('backend.product.edit_product',compact('product','suppliers','categories'));
    }
}
