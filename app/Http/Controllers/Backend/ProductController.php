<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;

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

        $pcode = IdGenerator::generate(['table' => 'products','field' => 'product_code','length' => 4, 'prefix' => 'PC']);
       
        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();

        Image::make($image)->resize(300,300)->save('upload/products/'.$name_gen);
        $save_url = 'upload/products/'.$name_gen;


        Product::insert([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'product_code' => $pcode,
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

    public function update(Request $request) {
        $product_id = $request->id;
        $product = Product::findOrFail($product_id);

        if($request->file('product_image')){

            $image = $request->file('product_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(300,300)->save('upload/products/'.$name_gen);
            $save_url = 'upload/products/'.$name_gen;

        

            $product->update([
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
             
        $notification = array (
            'message' => 'Product Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);

        } else {
            $product->update([
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'product_code' => $request->product_code,
                'product_garage' => $request->product_garage,
                'product_store' => $request->product_store,
                'buying_date' => $request->buying_date,
                'expire_date' => $request->expire_date,
                'buying_price' => $request->buying_price,
                'selling_price' => $request->selling_price,
                'created_at' => Carbon::now(),
            ]);
            
        $notification = array (
            'message' => 'Product Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);
        }
        
    }

    public function delete($id) {
        $Product = Product::findOrFail($id);
        $image = $Product->product_image;

        if($image !== 'upload/no_image.png') {
            unlink($image);
        }

        Product::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function code($id) {
        $product = Product::findOrFail($id);

        return view('backend.product.barcode_product',compact('product'));
    
    }

    public function importProduct() {
        return view('backend.product.import_product');
    }

    public function export() {

        return Excel::download(new ProductExport, 'products.xlsx');
    }

    public function import(Request $request) {
        Excel::import( new ProductImport, $request->file('import_file'));
             
        $notification = array (
            'message' => 'Product Imported!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
