<?php

namespace App\Http\Controllers\Backend;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class SupplierController extends Controller
{
    public function all() {
        $suppliers = Supplier::latest()->get();

        return view('backend.suppliers.all_suppliers',compact('suppliers'));
    }

    public function add() {
        return view('backend.suppliers.add_supplier');
    }

    public function store(Request $request) {

        $validateData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'address' => 'required',
            'type' => 'required',
            'shopname' => 'required',
            'account_holder' => 'required|unique:customers',
            'account_number' => 'required|unique:customers',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'city' => 'required',
        ]);

        if($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();

            Image::make($image)->resize(300,300)->save('upload/suppliers/'.$name_gen);
            $save_url = 'upload/suppliers/'.$name_gen;
        } else {
            $save_url = 'upload/no_image.png';
        }

        Supplier::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'type' => $request->type,
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
            'message' => 'Supplier Created!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.suppliers')->with($notification);
    }

    public function edit($id) {
        $supplier = Supplier::findOrFail($id);
        
        return view('backend.suppliers.edit_supplier',compact('supplier'));
    }

    public function update(Request $request) {
        $supplier_id = $request->id;
        $supplier = Supplier::findOrfail($supplier_id);

        $validateData = array([
            'name' => 'max:200',
        ]);

        if($request->email !== $supplier->email) {
            $validateData['email'] = 'email|unique:suppliers';
        }

        if($request->account_holder !== $supplier->account_holder) {
            $validateData['account_holder'] = 'unique:suppliers';
        }

        if($request->account_number !== $supplier->account_number) {
            $validateData['account_number'] = 'unique:suppliers';
        }

        $request->validate($validateData);

        if($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();

            Image::make($image)->resize(300,300)->save('upload/suppliers/'.$name_gen);
            $save_url = 'upload/suppliers/'.$name_gen;
        } else {
            $save_url = $supplier->image;
        }

        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'type' => $request->type,
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
            'message' => 'Supplier Updated!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.suppliers')->with($notification);
    }

    public function delete($id) {
        $supplier = Supplier::findOrFail($id);
        $image = $supplier->image;

        if($image !== 'upload/no_image.png') {
            unlink($image);
        }

        Supplier::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supplier Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function details($id) {
        $supplier = Supplier::findOrFail($id);

        return view('backend.suppliers.supplier_details',compact('supplier'));
    }
}
