<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function finalInvoice(Request $request){

        $data = array();

        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['total_products'] = $request->total_products;
        $data['sub_total'] = $request->sub_total;
        $data['vat'] = $request->vat;
        $data['invoice_no'] = 'EPOS'.mt_rand(10000000,99999999);
        $data['total'] = $request->total;
        $data['payment_status'] = $request->payment_status;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;
        $data['created_at'] = Carbon::now();

        $order_id = Order::insertGetId($data);
        $contents = Cart::content();

        $pdata = array();

        foreach($contents as $item){
            $pdata['order_id'] = $order_id;
            $pdata['product_id'] = $item->id;
            $pdata['quantity'] = $item->qty;
            $pdata['unit_cost'] = $item->price;
            $pdata['total'] = $item->subtotal;

            $insert = OrderDetails::insert($pdata);
        };

        $notification = array(
            'message' => 'Order Placed!',
            'alert-type' => 'success',
        );

        Cart::destroy();

        return redirect()->route('dashboard')->with($notification);
    }

    public function pending() {

        $orders = Order::where('order_status', 'Pending')->get();
        return view('backend.order.pending_orders',compact('orders'));
    }

    public function details($order_id){

        $order = Order::where('id',$order_id)->first();
        $orderItems = OrderDetails::with('product')->where('order_id',$order_id)->orderBy('id', 'DESC')->get();

        return view('backend.order.order_details',compact('order','orderItems'));
    }

    public function statusUpdate(Request $request) {

        $order_id = $request->id;
        $product = OrderDetails::where('order_id',$order_id)->get();

        foreach($product as $item){
            Product::where('id',$item->product_id)
                ->update(['product_store' => DB::raw('product_store-'.$item->quantity)]);

        }

        Order::findOrFail($order_id)->update([
            'order_status' => 'Complete',
        ]);
        
        $notification = array(
            'message' => 'Order Complete!',
            'alert-type' => 'success',
        );

        return redirect()->route('pending.orders')->with($notification);
    }

    public function complete(){

        $orders = Order::where('order_status', 'Complete')->get();
        return view('backend.order.complete_orders',compact('orders'));
    }

    public function manageStock(){

        $products = Product::latest()->get();

        return view('backend.stock.all_stock',compact('products'));
    }

    public function downloadInvoice($order_id){

        $order = Order::where('id',$order_id)->first();
        $order_items = OrderDetails::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

        $pdf = Pdf::loadView('backend.order.order_invoice', compact('order','order_items'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
