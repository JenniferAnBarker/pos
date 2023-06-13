<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

class PosController extends Controller
{
    public function pos() {

        $todaydate = Carbon::now();

        $products = Product::where('expire_date', '>', $todaydate)->latest()->get();
        $customers = Customer::all();
        return view('backend.pos.pos_page',compact('products','customers'));
    }

    public function addCart(Request $request) {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'weight' => 20,
            'options' => ['size' => 'large'],
        ]);

        $notification = array(
            'message' => 'Added to Cart!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function textItem() {

        $product_item = Cart::content();

        return view('backend.pos.text_item',compact('product_item'));
    }

    public function updateCart(Request $request, $rowId) {

        $qty = $request->qty;
        $update = Cart::update($rowId,$qty);
        
        $notification = array(
            'message' => 'Cart Updated!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function removeItem($rowId) {

        $remove = Cart::remove($rowId);

        $notification = array(
            'message' => 'Item Removed!',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    public function createInvoice(Request $request) {

        $contents = Cart::content();
        $cust_id = $request->customer_id;
        $customer = Customer::where('id',$cust_id)->first();

        return view('backend.invoice.product_invoice',compact('contents','customer'));

    }
}
