<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\AdvanceSalary;
use App\Models\Employee;

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

        $advance = AdvanceSalary::where('month'.$month)->where('employee_id',$employee_id)->first();

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
}
