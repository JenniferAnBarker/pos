<?php

namespace App\Http\Controllers\Backend;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function all() {
        $employee = Employee::latest()->get();
        return view('backend.employee.all_employee',compact('employee'));
    }
    
    public function add() {
        return view('backend.employee.add_employee');
    }
    
    public function store(Request $request) {

        $validateData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
            'address' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'vacation' => 'required'
        ]);

        if($request->file('image')){

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();

            Image::make($image)->resize(300,300)->save('upload/employee/'.$name_gen);
            $save_url = 'upload/employee/'.$name_gen;

            
        } else {    
            $save_url = 'upload/no_image.png';
            
        }

        Employee::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'vacation' => $request->vacation,
            'city' => $request->city,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);


        $notification = array (
            'message' => 'New Employee Added!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification);
    }

    public function edit($id) {
        $employee = Employee::findOrFail($id);
        return view('backend/employee/edit_employee',compact('employee'));
    }

    public function update(Request $request) {
        $employee_id = $request->id;
        $employee = Employee::findOrFail($employee_id);

        if($request->email == $employee->email){
            $validateData = $request->validate([
                'name' => 'max:200',
            ]);
        } else{
            $validateData = $request->validate([
                'name' => 'max:200',
                'email' => 'email|unique:employees'
            ]);
        }

        if($request->file('image')){

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(300,300)->save('upload/employee/'.$name_gen);
            $save_url = 'upload/employee/'.$name_gen;

        } else {
            $save_url = $employee->image;
        }

        Employee::findOrFail($employee_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'vacation' => $request->vacation,
            'city' => $request->city,
            'image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        
        $notification = array (
            'message' => 'Employee Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification);
    }

    public function delete($id) {
        $employee = Employee::findOrFail($id);
        $image = $employee->image;
        unlink($image);

        Employee::findOrFail($id)->delete();
        
        $notification = array (
            'message' => 'Employee Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
