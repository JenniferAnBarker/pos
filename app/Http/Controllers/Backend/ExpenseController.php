<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function add() {
        return view('backend.expense.add_expense');
    }

    public function store(Request $request) {

        Expense::insert([
            'details' => $request->details,
            'amount' => $request->amount,
            'month' => $request->month,
            'year' => $request->year,
            'date' => $request->date,
            'created_at' => Carbon::now(),
        ]);
        
        $notification = array (
            'message' => 'New Expense Added!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function daily() {
        $date = date('d-m-Y');
        $today = Expense::where('date', $date)->get();

        return view('backend.expense.daily_expenses',compact('today'));
    }

    public function edit($id) {
        $expense = Expense::findOrFail($id);
        return view('backend.expense.edit_expense',compact('expense'));
    }

    public function update(Request $request) {
        $expense_id = $request->id;
        $expense = Expense::findOrFail($expense_id);

        $expense->update([
            'details' => $request->details,
            'amount' => $request->amount,
            'month' => $request->month,
            'year' => $request->year,
            'date' => $request->date,
            'created_at' => Carbon::now(),
        ]);
        
        $notification = array (
            'message' => 'Expense Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('daily.expense')->with($notification);

    }

    public function month() {
        $month = date('F');
        $monthexp = Expense::where('month', $month)->get();

        return view('backend.expense.monthly_expenses',compact('monthexp'));
    }

    public function year() {
        $year = date('Y');
        $yearexp = Expense::where('year', $year)->get();

        return view('backend.expense.yearly_expenses',compact('yearexp'));
    }
}
