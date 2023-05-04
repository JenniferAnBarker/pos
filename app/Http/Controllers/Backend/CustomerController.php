<?php

namespace App\Http\Controllers\Backend;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function all() {

        $customers = Customer::latest()->get();

        return view('backend.customer.all_customers',compact('customers'));
    }
    
    public function add() {

        return view('backend.customer.add_customer');
    }
    
    public function store(Request $request) {
        
        $validateData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'address' => 'required',
            'shopname' => 'required|unique:customers',
            'account_holder' => 'required|unique:customers',
            'account_number' => 'required|unique:customers',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'city' => 'required',
        ]);

        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();

            Image::make($image)->resize(300,300)->save('upload/customers/'.$name_gen);
            $save_url = 'upload/customers/'.$name_gen;

        } else {

            $save_url = 'upload/no_image.png';

        }

        Customer::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'shopname' => $request->shopname,
            'image' => $save_url,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'city' => $request->city,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Customer Created!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.customers')->with($notification);
    }

    public function edit($id) {
        $customer = Customer::findOrFail($id);
        return view('backend.customer.edit_customer',compact('customer'));
    }

    public function update(Request $request) {
        $customer_id = $request->id;
        $customer = Customer::findOrFail($customer_id);

        //make $validateData
        //if statements to ammend things to check on array
        //$request->validate($validateData)

        $validateData = array ([
            'name' => 'max:200',
        ]);

        if($request->email !== $customer->email) {
            $validateData['email'] = 'email|unique:customers';
        }

        if($request->shopname !== $customer->shopname) {
            $validateData['shopname'] = 'unique:customers';
        }

        if($request->account_holder !== $customer->account_holder) {
            $validateData['account_holder'] = 'unique:customers';
        }

        if($request->account_number !== $customer->account_number) {
            $validateData['account_number'] = 'unique:customers';
        }

        $request->validate($validateData);

        if($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(300,300)->save('upload/customers/'.$name_gen);
            $save_url = 'upload/customers/'.$name_gen;
        } else {
            $save_url = $customer->image;
        }

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'shopname' => $request->shopname,
            'image' => $save_url,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'city' => $request->city,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Customer Edited!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.customers')->with($notification);
    }

    public function delete($id) {
        $customer = Customer::findOrFail($id);
        $image = $customer->image;

        if($image !== 'upload/no_image.png') {
            unlink($image);
        }

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
