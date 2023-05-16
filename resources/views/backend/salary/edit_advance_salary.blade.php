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
                        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Advance Salary</a></li> --}}
                        
                        <li class="breadcrumb-item active">Edit Advance Salary</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Advance Salary</h4>
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
                            <form method="post" action="{{ route('advance.salary.update')}}">
                                @csrf

                                <input type="hidden" name="id" value="{{$advance->id}}">

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add Advance Salary</h5>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="employee_id" class="form-label">Employee Name</label>
                                            <select name="employee_id" id="employee_id" class="form-select @error('employee_id') is-invalid @enderror">
                                                <option selected disabled >Select Employee</option>
                                                @foreach($employees as $emp)
                                                <option value="{{ $emp->id}}" {{ $emp->id == $advance->employee_id ? 'selected' : ''}}>{{ $emp->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="month" class="form-label">Salary Month</label>
                                            <select name="month" id="month" class="form-select @error('month') is-invalid @enderror">
                                                <option selected disabled >Select Month</option>
                                                <option value="January" {{ $advance->month == 'January' ? 'selected' : ''}}>January</option>
                                                <option value="February" {{ $advance->month == 'February' ? 'selected' : ''}}>February</option>
                                                <option value="March" {{ $advance->month == 'March' ? 'selected' : ''}}>March</option>
                                                <option value="April" {{ $advance->month == 'April' ? 'selected' : ''}}>April</option>
                                                <option value="May" {{ $advance->month == 'May' ? 'selected' : ''}}>May</option>
                                                <option value="June" {{ $advance->month == 'June' ? 'selected' : ''}}>June</option>
                                                <option value="July" {{ $advance->month == 'July' ? 'selected' : ''}}>July</option>
                                                <option value="August" {{ $advance->month == 'August' ? 'selected' : ''}}>August</option>
                                                <option value="September" {{ $advance->month == 'September' ? 'selected' : ''}}>September</option>
                                                <option value="October" {{ $advance->month == 'October' ? 'selected' : ''}}>October</option>
                                                <option value="November" {{ $advance->month == 'November' ? 'selected' : ''}}>November</option>
                                                <option value="December" {{ $advance->month == 'December' ? 'selected' : ''}}>December</option>
                                            </select>
                                            @error('month')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->


                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="year" class="form-label">Salary Year</label>
                                            <select name="year" id="year" class="form-select @error('year') is-invalid @enderror">
                                                <option selected disabled >Select an option</option>
                                                <option value="2023" {{ $advance->year == '2023' ? 'selected' : ''}}>2023</option>
                                                <option value="2024" {{ $advance->year == '2024' ? 'selected' : ''}}>2024</option>
                                                <option value="2025" {{ $advance->year == '2025' ? 'selected' : ''}}>2025</option>
                                                <option value="2026" {{ $advance->year == '2026' ? 'selected' : ''}}>2026</option>
                                                <option value="2027" {{ $advance->year == '2027' ? 'selected' : ''}}>2027</option>
                                            </select>
                                            @error('year')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="advance_salary" class="form-label">Advance Salary</label>
                                            <input type="text" name="advance_salary" class="form-control @error('advance_salary') is-invalid @enderror" id="advance_salary" value="{{ $advance->advance_salary }}">
                                            @error('advance_salary')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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