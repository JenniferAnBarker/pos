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
                            <a href="{{ route('add.advance.salary')}}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Salary Advance</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Pay Salaries</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{date("F Y")}}</h4>

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Employee</th>
                                    <th>Month</th>
                                    <th>Salary</th>
                                    <th>Advance Amount</th>
                                    <th>Amount Due</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach($employees as $key=> $emp)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td> <img src="{{ asset($emp->image)}}" style="width:50px; height:40px;"> </td>
                                    <td>{{$emp->name}}</td>
                                    <td><span class="badge bg-info">{{date("F", strtotime('-1 month'))}}</span></td>
                                    <td>£ {{ number_format((float)$emp->salary, 2, '.', '')}}</td>
                                    <td>
                                        @if(empty($emp->advance->advance_salary))
                                            <p>No Advance</p>
                                        @else
                                           £ {{ number_format((float)$emp->advance->advance_salary, 2, '.', '')}}
                                        @endif    
                                    </td>
                                    <td>
                                        @if(empty($emp->advance->advance_salary))
                                            <strong style="color: #fff;">£ {{ number_format((float)$emp->salary, 2, '.', '')}}</strong>
                                        @else
                                        @php
                                            $amount = $emp->salary - $emp->advance->advance_salary;
                                        @endphp
                                        <strong style="color: #fff;">£ {{ number_format((float)$amount, 2, '.', '')}}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pay.now.salary',$emp->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light">Pay Now</a>
                                        
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