<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendanceList() {
        $allData = Attendance::select('date')->groupBy('date')->orderBy('date','desc')->get();
        return view('backend.attendance.view_employee_attendance',compact('allData'));
    }

    public function attendanceAdd() {
        $employees = Employee::all();
        return view('backend.attendance.add_employee_attendance', compact('employees'));
    }

    public function store(Request $request) {
        Attendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();

        $countemployee = count($request->employee_id);

         for ($i=0; $i < $countemployee; $i++) {
            $attend_status = 'attend_status'.$i;
            $attend = new Attendance();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();
         };
         
        $notification = array (
            'message' => 'Attendance Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.attendance.list')->with($notification);
    }

    public function attendanceEdit($date) {
        $employees = Employee::all();
        $editData = Attendance::where('date',$date)->get();
        return view('backend.attendance.edit_employee_attendance', compact('employees','editData'));
    }

    public function attendanceView($date) {
        $employees = Employee::all();
        $details = Attendance::where('date',$date)->orderBy('id', 'desc')->get();
        return view('backend.attendance.details_employee_attendance', compact('employees','details'));
    }
}
