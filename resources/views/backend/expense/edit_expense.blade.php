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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Expense</a></li>
                        
                        <li class="breadcrumb-item active">Edit Expense</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Expense</h4>
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
                            <form method="post" action="{{ route('update.expense')}}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $expense->id}}">


                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Edit Expense</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Expense Details</label>
                                            <textarea name="details" class="form-control" id="example-textarea" rows="3">
                                                {{ $expense->details}}
                                            </textarea>
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Amount</label>
                                            <input type="text" name="amount" class="form-control" value="{{ $expense->amount}}">
                                        </div>
                                    </div> <!-- end col -->
                                    
                                </div> <!-- end row -->

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="hidden" name="date" class="form-control" value="{{ $expense->date}}">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="hidden" name="month" class="form-control" value="{{ $expense->month}}">
                                        </div>
                                    </div> <!-- end col -->

                                </div> <!-- end row -->

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="hidden" name="year" class="form-control" value="{{ $expense->year}}">
                                        </div>
                                    </div> <!-- end col -->

                                    

                                </div>  <!-- end row -->

                                

                                

                                
                                
                                
                                

                                
                                
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
8

@endsection