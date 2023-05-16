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
        $allData = Attendance::orderBy('id', 'desc')->get();
        return view('backend.attendance.view_employee_attendance',compact('allData'));
    }

    public function attendanceAdd() {
        $employees = Employee::all();
        return view('backend.attendance.add_employee_attendance', compact('employees'));
    }

    public function store(Request $request) {

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
}
