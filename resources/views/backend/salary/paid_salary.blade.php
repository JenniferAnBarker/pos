@extends('admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        
                        <li class="breadcrumb-item active">Pay Salary</li>
                    </ol>
                </div>
                <h4 class="page-title">Pay Salary</h4>
            </div>
        </div>
    </div>     
    <!-- end page title -->

    <!-- start page content -->
    <div class="row">
        <div class="col-lg-8 col-xl-12">
            <div class="card">
                <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form method="post" action="{{ route('employee.salary.store')}}">
                                @csrf

                                <input type="hidden" name="id" value="{{$paysalary->id}}">

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Pay Salary</h5>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="employee_id" class="form-label">Employee Name</label>
                                           <strong style="color: #fff;">{{ $paysalary->name}}</strong>
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="month" class="form-label">Salary Month</label>
                                            <strong style="color: #fff;">{{ date("F", strtotime('-1 month'))}}</strong>
                                            <input type="hidden" name="month" value="{{date("F", strtotime('-1 month'))}}">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->


                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="year" class="form-label">Employee Salary</label>
                                            <strong style="color: #fff;">£ {{ number_format((float)$paysalary->salary, 2, '.', '')}}</strong>
                                            <input type="hidden" name="paid_amount" value="{{ $paysalary->salary}}">
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="year" class="form-label">Salary Advances</label>
                                            <strong style="color: #fff;">£ {{ empty($paysalary->advance->advance_salary) ? 0 : number_format((float)$paysalary->advance->advance_salary, 2, '.', '') }}</strong>
                                            <input type="hidden" name="advance_salary" value="{{ empty($paysalary->advance->advance_salary) ? '' : $paysalary->advance->advance_salary}}">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="year" class="form-label">Salary Due</label>
                                            @if (!empty($paysalary->advance->advance_salary))
                                            @php
                                            $amount = $paysalary->salary - $paysalary->advance->advance_salary;
                                            @endphp
                                            @else
                                            @php
                                            $amount = $paysalary->salary
                                            @endphp
                                            @endif
                                            <strong style="color: #fff;"> £ {{ number_format((float)$amount, 2, '.', '')}}</strong>
                                            <input type="hidden" name="due_salary" value=" {{ round($amount)}}">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="fa-solid fa-receipt"></i> Pay</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->

                    {{-- </div> <!-- end tab-content --> --}}
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end page content -->

</div>

@endsection