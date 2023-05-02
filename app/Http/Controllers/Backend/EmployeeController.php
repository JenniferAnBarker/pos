<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function all() {
        $employee = Employee::latest()->get();
        return view('backend.employee.all_employee',compact('employee'));
    }
}
