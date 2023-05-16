@extends('admin_dashboard')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            {{-- <a href="{{ route('add.advance.salary')}}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Salary Advance</a> --}}
                        </ol>
                    </div>
                    <h4 class="page-title">Last Months Salaries</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Employee</th>
                                    <th>Month</th>
                                    <th>Salary</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach($paidsalary as $key=> $paid)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td> <img src="{{ asset($paid->employee->image)}}" style="width:50px; height:40px;"> </td>
                                    <td>{{ $paid['employee']['name']}}</td> <!-- One way to write the relationship reference --->
                                    <td>{{ $paid->salary_month}}</td>
                                    <td>£ {{ $paid->paid_amount}}</td>  <!-- Another way to write the relationship reference --->
                                    <td><span class="badge bg-success">Fully Paid</span></td>
                                    <td>
                                        <a href="{{ route('previous.paid.month',$paid->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light" id="">History</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
        
    </div> <!-- container -->

</div> <!-- content -->

@endsection