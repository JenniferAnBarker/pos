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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Add Advance Salary</a></li>
                        
                        <li class="breadcrumb-item active">Add Advance Salary</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Advance Salary</h4>
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
                            <form method="post" action="{{ route('advance.salary.store')}}"
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add Advance Salary</h5>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="employee_id" class="form-label">Employee Name</label>
                                            <select name="employee_id" id="example-select" class="form-select @error('employee_id') is-invalid @enderror">
                                                <option selected disabled >Select Employee</option>
                                                @foreach($employees as $emp)
                                                <option value="{{ $emp->id}}">{{ $emp->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="month" class="form-label">Salary Month</label>
                                            <select name="month" id="example-select" class="form-select @error('month') is-invalid @enderror">
                                                <option selected disabled >Select Month</option>
                                                <option value="january">January</option>
                                                <option value="february">February</option>
                                                <option value="march">March</option>
                                                <option value="april">April</option>
                                                <option value="may">May</option>
                                                <option value="june">June</option>
                                                <option value="july">July</option>
                                                <option value="august">August</option>
                                                <option value="september">September</option>
                                                <option value="october">October</option>
                                                <option value="november">November</option>
                                                <option value="december">December</option>
                                            </select>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->


                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="year" class="form-label">Salary Year</label>
                                            <select name="year" id="example-select" class="form-select @error('year') is-invalid @enderror">
                                                <option selected disabled >Select an option</option>
                                                <option value="1 year">2023</option>
                                                <option value="2 year">2024</option>
                                                <option value="3 year">2025</option>
                                                <option value="4 year">2026</option>
                                                <option value="5 year">2027</option>
                                            </select>
                                            @error('experience')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="advanca_salary" class="form-label">Advance Salary</label>
                                            <input type="text" name="advanca_salary" class="form-control @error('advanca_salary') is-invalid @enderror" id="advanca_salary" value="">
                                            @error('salary')
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