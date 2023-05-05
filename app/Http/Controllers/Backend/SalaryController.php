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
}
