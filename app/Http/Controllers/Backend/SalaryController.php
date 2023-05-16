<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\AdvanceSalary;
use App\Models\Employee;
use App\Models\PaySalary;

class SalaryController extends Controller
{
    public function add() {
        $employees = Employee::latest()->get();
        return view('backend.salary.add_advance_salary',compact('employees'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'month' => 'required',
            'year' => 'required',
            'advance_salary' => 'required|max:255',
        ]);

        $month = $request->month;
        $employee_id = $request->employee_id;

        $advance = AdvanceSalary::where('month',$month)->where('employee_id',$employee_id)->first();

        if($advance === NULL) {
            AdvanceSalary::insert([
                'employee_id' => $request->employee_id,
                'month' => $request->month,
                'year' => $request->year,
                'advance_salary' => $request->advance_salary,
                'created_at' => Carbon::now(),
            ]);

                
            $notification = array(
                'message' => 'Salary Advance Paid Successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

        } else {

            $notification = array(
                'message' => 'Advance Already Paid!',
                'alert-type' => 'warning',
            );

            return redirect()->back()->with($notification);
        }
    }

    public function all() {
        $advances = AdvanceSalary::latest()->get();
        return view('backend.salary.all_advance_salary',compact('advances'));
    }

    public function edit($id) {
        $employees = Employee::latest()->get();
        $advance = AdvanceSalary::findOrFail($id);
        return view('backend.salary.edit_advance_salary',compact('advance','employees'));
    }

    public function update(Request $request) {
        $advance_id = $request->id;

        AdvanceSalary::findOrFail($advance_id)->update([
            'employee_id' => $request->employee_id,
            'month' => $request->month,
            'year' => $request->year,
            'advance_salary' => $request->advance_salary,
            'created_at' => Carbon::now(),
        ]);

            
        $notification = array(
            'message' => 'Salary Advance Paid Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.advance.salary')->with($notification);
    }

    public function delete($id) {
        
        AdvanceSalary::findOrFail($id)->delete();
        
        $notification = array (
            'message' => 'Advance Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    ////////////////////Pay Salary Methods/////////////////////////

    public function pay() {
        $employees = Employee::latest()->get();
        return view('backend.salary.pay_salary',compact('employees'));
    }

    public function paynow($id) {
        $paysalary = Employee::findOrFail($id);
        return view('backend.salary.paid_salary',compact('paysalary'));
    }
}
